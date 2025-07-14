<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Laporan;
use App\Models\Petugas;
use App\Models\Wilayah;
use Illuminate\Http\Request;
use App\Models\Kanal_Laporan;
use App\Models\kategoriLaporan;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Storage;


class DashboardController extends Controller
{
    //
    public function index()
    {
        $all_laporan = Laporan::all()->count();
        $wilayah = Wilayah::all()->count();
        $kategori_laporan = kategoriLaporan::all()->count();
        $kanal_laporan = Kanal_Laporan::all()->count();
        $today = Laporan::whereDate('created_at', Carbon::today())->count();

        $daerah = Wilayah::all();
        $categories = kategoriLaporan::all();
        $kanals = Kanal_Laporan::all();
        $users = User::all();

        // $total_laporan = Laporan::select(DB::raw("COUNT(id) as id"), DB::raw("MONTHNAME(created_at) as Month"))
        //     ->whereDate('created_at', '>=', date('Y-m-01', strtotime('-11 month')))
        //     ->whereDate('created_at', '<=', date('Y-m-t', strtotime('now')))
        //     ->groupBy(DB::raw("Month"))
        //     ->orderBy(DB::raw("Month"))
        //     ->pluck('id');

        // $month_laporan = Laporan::select(DB::raw("MONTHNAME(created_at) as Month"))
        //     ->whereDate('created_at', '>=', date('Y-m-01', strtotime('-11 month')))
        //     ->whereDate('created_at', '<=', date('Y-m-t', strtotime('now')))
        //     ->groupBy(DB::raw("Month"))
        //     ->orderBy(DB::raw("Month"))
        //     ->pluck('Month');

        // $total_laporan_pertahun = Laporan::select(DB::raw("COUNT(id) as id"), DB::raw("YEAR(created_at) as Year"))
        //     ->whereDate('created_at', '>=', date('Y-m-01', strtotime('-11 year')))
        //     ->whereDate('created_at', '<=', date('Y-m-t', strtotime('now')))
        //     ->groupBy(DB::raw("Year"))
        //     ->orderBy(DB::raw("Year"))
        //     ->pluck('id');

        // $years_laporan = Laporan::select(DB::raw("YEAR(created_at) as Year"))
        //     ->whereDate('created_at', '>=', date('Y-m-01', strtotime('-11 year')))
        //     ->whereDate('created_at', '<=', date('Y-m-t', strtotime('now')))
        //     ->groupBy(DB::raw("Year"))
        //     ->orderBy(DB::raw("Year"))
        //     ->pluck('Year');


        return view('Dashboard/Home',compact(
            'all_laporan','today','kategori_laporan','kanal_laporan','wilayah','categories','daerah','kanals'
            ));
    }

    public function kategori(Request $request)
    {
        $laporan = Laporan::query()
            // ->whereDate('created_at', '>=', date('Y-m-01', strtotime('-11 month')))
            // ->whereDate('created_at', '<=', date('Y-m-t', strtotime('now')))
            ->whereDate('created_at', '>=', date('Y-m-01', strtotime('-11 year')))
            ->whereDate('created_at', '<=', date('Y-m-t', strtotime('now')))
            ->when($request->filled('kategori') == "kategori",function($query) use ($request){
                $query->where('category_laporan_id',$request->kategori);
            })
            ->when($request->filled('daerah') == "daerah",function($query) use ($request){
                $query->where('wilayah_id',$request->daerah);
            })
            ->when($request->filled('kanal') == "kanal",function($query) use ($request){
                $query->where('kanal_laporan_id',$request->kanal);
            })
            ->orderBy('created_at')
            ->get()
            ->groupBy(function($query) use ($request){
                if($request->periode == "daily"){
                    return Carbon::parse($query->created_at)->translatedFormat('d-M-Y');
                }elseif($request->periode == 'monthly'){
                    return Carbon::parse($query->created_at)->translatedFormat('M-Y');
                }else{
                    return Carbon::parse($query->created_at)->translatedFormat('Y');
                }
            });


        $data = [];
        $periode = [];

        foreach($laporan as $key => $item){
            $periode[] = $key;
            $data[] = $item->count();
        }
        $data = [
            'total' => $data,
            'periode' => $periode,
        ];
        return response()->json($data);
    }








public function setting(User $petuga)
{

    return view('setting',compact('petuga'));
}

public function update(Request $request, User $petuga)
{
      $this->validate($request, [
       'name' => 'required',
       'email' => 'required',
       'password' => 'required',
       'phone' => 'required',
   ]);

   //check if image is uploaded
   if ($request->hasFile('image')) {

       //upload new image
       $image = $request->file('image');
       $image->storeAs('image/', $image->hashName());

       //delete old image
       Storage::delete('image/'.$petuga->image);


       //update petuga with new image
       $petuga->update([
           'name'     => $request->name,
           'phone'   => $request->phone,
           'email'   => $request->email,
           'password'   => bcrypt($request->password),
           'image'   =>$image->hashName()
       ]);

   } else {

       //update petuga without image
       $petuga->update([
           'name' => $request->name,
           'phone'   => $request->phone,
           'email'   => $request->email,
           'password'   => bcrypt($request->password)
       ]);
   }


    //redirect to index
    return redirect('dashboard')->with(['success' => 'Data Berhasil Diubah!']);
}


public function destroy(User $petuga)
{

   Storage::delete('image/'. $petuga->image);

    //delete lapo$laporan
    $petuga->delete();

    //redirect to index
    return redirect('dashboard')->with(['success' => 'Data Berhasil Dihapus!']);
}



}
