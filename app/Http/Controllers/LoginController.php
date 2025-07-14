<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Cookie;

class LoginController extends Controller
{
    //

    public function index()
    {
        return view('Auth/login');
    }

    public function login(Request $request,User $user)
    {
       $credentials = $this->validate($request, [
            'name'    => 'required',
            'password' => 'required',
        ]);


        if($request->has('remember'))
        {
            Cookie::queue('name',$request->name,30);
            Cookie::queue('password',$request->password,30);
        }



        if (Auth::attempt($credentials)){

            $request->session()->regenerate();

            return redirect()->intended('/dashboard');
        }
            return back()->with('failed', 'Login Gagal!');

    }

    public function authenticated(Request $request, $user)
{
    if ($user->hasRole('Super Admin')) {
        return redirect()->route('dashboard');
    }

    return redirect()->route('login');
}



    public function forgot()
    {
        return view('Auth/forgot');
    }
    public function register()
    {
        return view('Auth/register');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'password' => 'required',
        ]);
        $validated['password'] = Hash::make( $request->password );
        User::create($validated);

        return redirect('login')->with('success', 'Register Berhasil');

    }
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login');
    }

}
