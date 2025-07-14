<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    //
    public function index()
    {
        $users = User::role('Admin')->get();
        return view('Dashboard/users/petugas',compact('users'));
    }

    public function create()
   {

       return view('Dashboard/users/create');
   }


    public function store(Request $request, User $user)
    {
        $this->validate($request, [
            'image'     => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'name'     => 'required|min:5',
            'email'   => 'required|min:10',
            'password'   => 'required',
            'phone'   => 'required|min:5',
        ]);

        //upload image
        $image = $request->file('image');
        $image->storeAs('image', $image->hashName());

        //create post
      $user =  User::create([
            'image'     => $image->hashName(),
            'name' => $request->name,
            'phone' => $request->phone,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        $user->assignRole('Admin');


            return redirect()->route('user.index')->with('success','User Berhasil Dibuat');

    }

    public function edit(User $user)
    {
        $users = User::all();
        return view('Dashboard/users/edit',compact('users','user'));
    }

    public function update(Request $request, User $user)
    {
          $this->validate($request, [
                'name' => 'required',
                'email' => 'required',
                'phone' => 'required',
       ]);

       //check if image is uploaded
       if ($request->hasFile('image')) {

        $image = $request->file('image');
        $image->storeAs('image', $image->hashName());
           //delete old image
           Storage::delete('image/'.$user->image);

           //update user with new image
           $user->update([
               'name'     => $request->name,
               'phone'   => $request->phone,
               'email'   => $request->email,
               'image'   => $request->hashName(),
           ]);

       } else {

           //update user without image
           $user->update([
               'name' => $request->name,
               'phone'   => $request->phone,
               'email'   => $request->email,
           ]);
       }

        //redirect to index
        return redirect()->route('user.index')->with(['success' => 'Data Berhasil Diubah!']);
    }

    public function destroy(User $user)
    {

       Storage::delete('image'. $user->image);

        //delete lapo$laporan
        $user->delete();

        //redirect to index
        return redirect()->route('user.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}
