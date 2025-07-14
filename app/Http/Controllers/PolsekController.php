<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Polsek;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class PolsekController extends Controller
{
    //

    public function index()
    {
        // $total_petugas = User::with("roles")->whereHas("roles", function($q) {
        //     $q->whereIn("name", ["Petugas"]);
        // })->count();
        // $roles = Role ::withCount('Petugas') -> paginate(5);

        $polisi = User::role('Petugas')->get();

        $polsek = Polsek::all();
        return view('Dashboard/Polsek/polsek',compact('polisi','polsek'));
    }


    public function store(Request $request)
    {
            $validateData = $this->validate($request, [
                'nama_polsek' => 'required',
            ]);

            $validateData['user_id'] = auth()->user()->id;

            Polsek::create($validateData);

            return redirect()->route('polsek.index')->with('success','Polsek Berhasil Dibuat');

    }

    public function edit(Polsek $polsek)
    {
        return view('Dashboard/Polsek/edit',compact('polsek'));
    }

    public function update(Request $request, Polsek $polsek)
    {
        //validate form
         $this->validate($request, [
            'nama_polsek' => 'required'
        ]);


         $polsek->update([
            'nama_polsek'     => $request->nama_polsek,
            'user_id'         => auth()->user()->id,
        ]);


        //redirect to index
        return redirect()->route('polsek.index')->with(['success' => 'Data Berhasil Diubah!']);
    }

    public function destroy(Polsek $polsek)
    {


        //delete lapo$laporan
        $polsek->delete();

        //redirect to index
        return redirect()->route('polsek.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }

}
