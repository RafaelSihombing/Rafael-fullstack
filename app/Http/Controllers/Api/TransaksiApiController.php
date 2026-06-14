<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class TransaksiApiController extends Controller
{
    // Menampilkan semua data
    public function index()
    {
        $data = DB::table('transaksi')->get();

        return response()->json([
            'success' => true,
            'message' => 'Data transaksi',
            'data' => $data
        ]);
    }

    // Menyimpan data
    public function store(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'nama_barang' => 'required',
                'jumlah' => 'required|integer',
                'harga' => 'required|numeric'
            ]
        );

        if ($validator->fails()) {

            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ], 400);
        }

        DB::table('transaksi')->insert([
            'nama_barang' => $request->nama_barang,
            'jumlah' => $request->jumlah,
            'harga' => $request->harga,
            'total' => $request->jumlah * $request->harga,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Data berhasil disimpan'
        ], 201);
    }

    // Menampilkan 1 data
    public function show($id)
    {
        $data = DB::table('transaksi')
            ->where('id', $id)
            ->first();

        if (!$data) {

            return response()->json([
                'success' => false,
                'message' => 'Data tidak ditemukan'
            ], 404);
        }

        return response()->json([
            'success' => true,
            'data' => $data
        ]);
    }

    // Menghapus data
    public function destroy($id)
    {
        DB::table('transaksi')
            ->where('id', $id)
            ->delete();

        return response()->json([
            'success' => true,
            'message' => 'Data berhasil dihapus'
        ]);
    }
}
