<?php

namespace App\Http\Controllers\back;

use App\Http\Controllers\Controller;
use App\Models\pinjaman;
use Illuminate\Http\Request;

class pinjamanController extends Controller
{
    public function index() {
        $pinjaman = pinjaman::get();
    
        return view('pinjaman.index', [
            'pinjaman' => $pinjaman
        ]);
    }   

    public function invoice() {
        $pinjaman = pinjaman::get();
    
        return view('pinjaman.invoice', [
            'pinjaman' => $pinjaman
        ]);
    }   










    public function delete(Request $request, $kode_pinjaman)
    {
        // Cari user berdasarkan ID
        $Pinjaman = pinjaman::find($kode_pinjaman);
   
        // Jika user tidak ditemukan
        if (!$Pinjaman) {
            return response()->json(['message' => 'Simpanan not found'], 404);
        }
   
        // Hapus user
        $Pinjaman->delete();
   
        return redirect(route('pinjaman.index'))->with('succes', 'Simpanan has been delete');
   
        return response()->json(['message' => 'Simpanan deleted successfully'], 200);
    }
}


