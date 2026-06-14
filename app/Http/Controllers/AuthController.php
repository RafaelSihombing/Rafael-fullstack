<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AuthController extends Controller
{
    public function index()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $user = DB::table('users')
            ->where('email', $request->email)
            ->first();

        if ($user && $request->password == $user->password) {
            session([
                'login' => true,
                'nama' => $user->name
            ]);

            return redirect('/transaksi');
        }

        return back()->with(
            'error',
            'Email atau Password Salah'
        );
    }

    public function logout()
    {
        session()->flush();

        return redirect('/');
    }
}
