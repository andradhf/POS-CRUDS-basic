<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class LoginController extends Controller
{
    public function Index()
    {
        return view('auth.login');
    }

    public function login_proses(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required'
        ]);

        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password

        ];
        if (Auth::attempt($data)) {
            return redirect()->route('admin.index');
        } else {
            return redirect()->route('login')->with('failed', 'username email atau Password salah');
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login')->with('success', 'Anda Berhasil Logout');
    }

    public function register()
    {
        return view('auth.register');
    }

    public function register_proses(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:7'
        ]);
        $data['name'] = $request->name;
        $data['email'] = $request->email;
        $data['password'] = Hash::make($request->password);

        User::create($data);

        $login = [
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password

        ];

        if (Auth::attempt($login)) {
            return redirect()->route('admin.index');
        } else {
            return redirect()->route('login')->with('failed', 'username email atau Password salah');
        }
    }
}
