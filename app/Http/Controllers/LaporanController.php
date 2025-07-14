<?php

namespace App\Http\Controllers;

use App\Models\Kanal_Laporan;
use App\Models\Laporan;
use Illuminate\Http\Request;
use App\Models\kategoriLaporan;
use App\Models\Wilayah;
use Illuminate\Support\Facades\Storage;

class LaporanController extends Controller
{
    //

    public function index(Request $request)
    {
        // $laporans = Laporan::all()->filter(request(['search']));

        $categories = kategoriLaporan::orderBy('jenis_laporan')->get();
        $wilayah = Wilayah::orderBy('wilayah')->get();
        $kanals = Kanal_Laporan::orderBy('kanal_laporan')->get();
        // dd($request->all());
        $laporans = Laporan::select('laporans.id as id_laporan', 'name', 'jenis_laporan', 'wilayah', 'nama_pelapor', 'laporans.phone', 'laporans.created_at', 'kanal_laporan')
            ->leftJoin('kategori_laporans','kategori_laporans.id','=','laporans.category_laporan_id')
            ->leftJoin('kanal__laporans','kanal__laporans.id','=','laporans.kanal_laporan_id')
            ->leftJoin('users','users.id','=','laporans.user_id')
            ->leftJoin('wilayahs','wilayahs.id','=','laporans.wilayah_id')
            ->when($request->search, function($query) use ($request){
                $query->where('nama_pelapor', 'like', '%'. strtoupper($request->search) .'%')
                    ->orWhere('laporans.phone', 'like', '%'. strtoupper($request->search) .'%')
                    ->orWhere('laporans.created_at', 'like', '%'.$request->search .'%')
                    ->orWhere('jenis_laporan',$request->search)
                    ->orWhere('name', 'like', '%'.  strtoupper($request->search) .'%')
                    ->orWhere('wilayah',$request->search)
                    // ->whereDate('laporans.created_at','like','%'.$request->search .'%')
                    ->orwhere('kanal_laporan', $request->search);
            })
            ->when($request->fromdate && $request->todate , function($query) use ($request){
                $query->whereDate('laporans.created_at','>=', $request->fromdate);
                $query->whereDate('laporans.created_at','<=', $request->todate);
                })
            ->when($request->id_kategori, function($query) use ($request){
                $query->where('category_laporan_id', $request->id_kategori);
            })
            ->when($request->wilayah_id, function($query) use ($request){
                $query->where('wilayah_id', $request->wilayah_id);
            })
            ->when($request->kanal_id , function($query) use ($request){
                $query->where('laporans.kanal_laporan_id', $request->kanal_id);
            })
            ->paginate(5);

        $laporans->appends($request->all());
        return view('Dashboard/laporan', compact('laporans','categories','wilayah','kanals'));
    }

    public function show(Laporan $laporan)
    {
        return view('Dashboard/show',[
            'laporans' => $laporan
        ]);
    }

    public function create()
    {
        $kategoris = kategoriLaporan::all();
        $kanals = Kanal_Laporan::all();
        $wilayah = Wilayah::all();
        return view('Dashboard/create',compact('kategoris','kanals','wilayah'));
    }

    public function store(Request $request)
    {
            $validateData = $this->validate($request, [
                'category_laporan_id'    => 'required',
                'kanal_laporan_id'    => 'required',
                'wilayah_id'    => 'required',
                'nama_pelapor' => 'required',
                'phone' => 'required',
                'detail_laporan' => 'required',
                'documentasi' => 'image|file|max:1024',
            ]);



            if($request->file('documentasi'))
            {
                $validateData['documentasi'] = $request->file('documentasi')->store('documentasi');
                $validateData['user_id'] = auth()->user()->id;
            }




            Laporan::create($validateData);

            return redirect()->route('laporan.index')->with('success','Laporan Berhasil Dibuat');

    }

    public function edit(Laporan $laporan)
    {
        $kategoris = kategoriLaporan::all();
        $kanals = Kanal_Laporan::all();
        $wilayah = Wilayah::all();
        return view('Dashboard/edit', compact('laporan','kategoris','kanals','wilayah'));
    }

    public function update(Request $request, Laporan $laporan)
    {
        //validate form
        $rules = [
                'category_laporan_id'    => 'required',
                'kanal_laporan_id'    => 'required',
                'wilayah_id'    => 'required',
                'nama_pelapor' => 'required',
                'phone' => 'required',
                'detail_laporan' => 'required',
                'documentasi' => 'image|file|max:1024',
        ];

        $validatedData = $request->validate($rules);

        if($request->file('documentasi'))
        {
            if($request->oldImage){
                Storage::delete($request->oldImage);
            }
            $validatedData['documentasi'] = $request->file('documentasi')->store('documentasi');
        }

        $validatedData['user_id'] = auth()->user()->id;



        Laporan::where('id', $laporan->id)
                    ->update($validatedData);

        //redirect to index
        return redirect()->route('laporan.index')->with(['success' => 'Data Berhasil Diubah!']);
    }

    public function destroy(Laporan $laporan)
    {
        //delete image
        Storage::delete('documentasi/'. $laporan->image);

        //delete lapo$laporan
        $laporan->delete();

        //redirect to index
        return redirect()->route('laporan.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }


}
