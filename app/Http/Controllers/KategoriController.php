<?php

namespace App\Http\Controllers;

use App\Models\kategoriLaporan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class KategoriController extends Controller
{
    //
    public function index()
    {
        $kategori = kategoriLaporan::all();
        return view('Dashboard/kategori/kategori',compact('kategori'));
    }


    public function store(Request $request)
    {
            $validateData = $this->validate($request, [
                'jenis_laporan' => 'required|unique:kategori_laporans',
            ]);

            kategoriLaporan::create($validateData);

            return redirect()->route('kategori.index')->with('success','kategori Laporan Berhasil Dibuat');

    }

    public function edit(kategoriLaporan $kategori)
    {
        $kategoris = kategoriLaporan::all();
        return view('Dashboard/kategori/edit',compact('kategori','kategoris'));
    }

    public function update(Request $request, kategoriLaporan $kategori)
    {
        //validate form
         $this->validate($request, [
            'jenis_laporan' => 'required|unique:kategori_laporans'
        ]);


         $kategori->update([
            'jenis_laporan'     => $request->jenis_laporan,
        ]);


        //redirect to index
        return redirect()->route('kategori.index')->with(['success' => 'Data Berhasil Diubah!']);
    }

    public function destroy(kategoriLaporan $kategori)
    {


        //delete lapo$laporan
        $kategori->delete();

        //redirect to index
        return redirect()->route('kategori.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}
