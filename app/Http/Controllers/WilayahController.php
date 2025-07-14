<?php

namespace App\Http\Controllers;

use App\Models\Wilayah;
use Illuminate\Http\Request;

class WilayahController extends Controller
{
    //
    public function index()
    {
        $wilayah = Wilayah::all();
        return view('Dashboard/wilayah/wilayah',compact('wilayah'));
    }


    public function store(Request $request)
    {
            $validateData = $this->validate($request, [
                'wilayah' => 'required|unique:wilayahs',
            ]);


            Wilayah::create($validateData);

            return redirect()->route('wilayah.index')->with('success','Wilayah Berhasil Dibuat');

    }

    public function edit(Wilayah $wilayah)
    {
        $kategoris = Wilayah::all();
        return view('Dashboard/wilayah/edit',compact('wilayah','kategoris'));
    }

    public function update(Request $request, Wilayah $wilayah)
    {
        //validate form
         $this->validate($request, [
            'wilayah' => 'required|unique:wilayahs'
        ]);


         $wilayah->update([
            'wilayah'     => $request->wilayah,
        ]);


        //redirect to index
        return redirect()->route('wilayah.index')->with(['success' => 'Data Berhasil Diubah!']);
    }

    public function destroy(Wilayah $wilayah)
    {


        //delete lapo$laporan
        $wilayah->delete();

        //redirect to index
        return redirect()->route('wilayah.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}
