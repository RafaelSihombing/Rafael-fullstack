<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TransaksiController extends Controller
{
    public function index()
    {
        if (!session('login')) {
            return redirect('/');
        }

        return view('transaksi');
    }

    public function store(Request $request)
    {
        DB::table('transaksi')->insert([

            'nama_barang' =>
            $request->nama_barang,

            'jumlah' =>
            $request->jumlah,

            'harga' =>
            $request->harga,

            'total' =>
            $request->jumlah *
                $request->harga,

            'created_at' => now(),
            'updated_at' => now()

        ]);

        return back()->with(
            'success',
            'Data Berhasil Disimpan'
        );
    }
}
