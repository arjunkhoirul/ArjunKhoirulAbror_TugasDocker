<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Polsek;
use App\Models\Wilayah;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PolisiController extends Controller
{
    //

    public function index(Request $request)
    {

        $petugass = User::role('Petugas')->filter(request(['search','polsek_id']))->get();

        $polsek = Polsek::all();


        return view('Dashboard/petugas/petugas',compact('petugass','polsek'));
    }

    public function create()
   {
       $polsek = Polsek::all();
       return view('Dashboard/petugas/create',compact('polsek'));
   }


    public function store(Request $request, User $petuga)
    {

       $petuga =  $this->validate($request, [
           'image'     => 'required',
           'name'     => 'required|min:5',
           'email'   => 'required|min:10',
           'password'   => 'required',
           'polsek_id'   => 'required',
           'phone'   => 'required|min:5',
       ]);

       //upload image
       $image = $request->file('image');
       $image->storeAs('image', $image->hashName());

       //create post
       $petuga =  User::create([
           'image'     => $image->hashName(),
           'name' => $request->name,
           'phone' => $request->phone,
           'email' => $request->email,
           'polsek_id' => $request->polsek_id,
           'password' => bcrypt($request->password),
       ]);

       $petuga->assignRole('Petugas');

            return redirect()->route('petugas.index')->with('success','User Berhasil Dibuat');

    }

    public function edit(User $petuga)
    {
        $polsek = Polsek::all();
        return view('Dashboard/petugas/edit',compact('petuga','polsek'));
    }

    public function update(Request $request, User $petuga)
    {
          $this->validate($request, [
           'name' => 'required',
           'email' => 'required',
           'phone' => 'required',
           'polsek_id' => 'required',
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
               'polsek_id'   => $request->polsek_id,
               'image'   =>$image->hashName()
           ]);

       } else {

           //update petuga without image
           $petuga->update([
               'name' => $request->name,
               'phone'   => $request->phone,
               'email'   => $request->email,
               'polsek_id'   => $request->polsek_id,
           ]);
       }


        //redirect to index
        return redirect()->route('petugas.index')->with(['success' => 'Data Berhasil Diubah!']);
    }

    public function destroy(User $petuga)
    {

       Storage::delete('image'. $petuga->image);

        //delete lapo$laporan
        $petuga->delete();

        //redirect to index
        return redirect()->route('petugas.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }

}
