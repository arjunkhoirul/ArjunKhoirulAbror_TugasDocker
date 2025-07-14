<?php

namespace App\Http\Controllers;

use App\Models\Kanal_Laporan;
use Illuminate\Http\Request;

class KanalController extends Controller
{
    //
    public function index()
    {
        $kanals = Kanal_Laporan::all();
        return view('Dashboard/kanal/kanal_laporan',compact('kanals'));
    }


    public function store(Request $request)
    {
            $validateData = $this->validate($request, [
                'kanal_laporan' => 'required',
            ]);

            Kanal_Laporan::create($validateData);

            return redirect()->route('kanal.index')->with('success','Kanal_Laporan Berhasil Dibuat');

    }

    public function edit(Kanal_Laporan $kanal)
    {
        $kategoris = Kanal_Laporan::all();
        return view('Dashboard/kanal/edit',compact('kanal','kategoris'));
    }

    public function update(Request $request, Kanal_Laporan $kanal)
    {
        //validate form
         $this->validate($request, [
            'kanal_laporan' => 'required',
        ]);


         $kanal->update([
            'kanal_laporan'     => $request->kanal_laporan,
        ]);


        //redirect to index
        return redirect()->route('kanal.index')->with(['success' => 'Data Berhasil Diubah!']);
    }

    public function destroy(Kanal_Laporan $kanal)
    {


        //delete lapo$laporan
        $kanal->delete();

        //redirect to index
        return redirect()->route('kanal.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}
