<?php

namespace App\Http\Controllers\back;

use App\Http\Controllers\Controller;
use App\Http\Requests\request\simpananRequestUpdate;

use App\Models\Anggota;
use App\Models\jenisSimpanan;
use App\Models\saldo;
use App\Models\simpanan;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class simpananController extends Controller
{
    public function index() {
        $simpanan = Simpanan::with('anggota')->get();
        return view('simpanan.index', compact('simpanan'));
    }   

    public function invoice() {
        $simpanan = simpanan::get();
    
        return view('simpanan.invoice', [
            'simpanan' => $simpanan
        ]);
    } 

    public function create(){
        $Simapanan = simpanan::get();
        $anggota = Anggota::get();
        $jenis = jenisSimpanan::get() ;

        return view('simpanan.create', [
            'simpanan' => $Simapanan,
            'anggota'  => $anggota,
            'jenis'    => $jenis
        ]);
    }
    


    public function store(Request $request){
        $data = $request->all();
        $anggota = Anggota::where('kode_anggota',$data['anggota_kode'])->first();
        $data['status'] = 1;
        $data['transaksi'] = 'kas';
        
        $props = $data['nominal'];
        $totalProps = 0;
        
       foreach ($props as $key => $prop) {
        if ($prop['nama'] !== 'pokok' ) {
            if (is_numeric($prop['nominal'])) {
                $totalProps += $prop['nominal'];
            }
        }
       }
        
       $props = $data['nominal'];
       $propsJson = json_encode($props);
       $data['nominal'] = $propsJson;
          
        DB::beginTransaction();
        try {
            $saldoKoprasi = new saldo();
            $saldoKoprasi->saldo = $totalProps;
            $saldoKoprasi->status = 1; 
            
            if ($anggota) {
                $saldoKoprasi->keterangan = 'anggota ' . $anggota->nama . ' telah melakukan ' . $data['transaksi'] . ' sebesar ' . $totalProps;
            } else {
                $saldoKoprasi->keterangan = 'Anggota tidak ditemukan';
            }
            
            $saldoKoprasi->save();
            simpanan::create($data);
        
            DB::commit();
            return redirect(route('simpanan.index'))->with('success', 'Simpanan has been created');
        } catch (Exception $e) {
            \Illuminate\Support\Facades\Log::error('Error while storing simpanan: ' . $e->getMessage());
        
            info($e->getMessage());
            DB::rollBack();
        
            return response()->json([
                "code" => 422,
                "status" => "Error",
                "message" => $e->getLine() . ' ' . $e->getMessage()
            ], 422);
        }
        
    }
    
    public function edit() {
        $simpanan = simpanan::first();
        $anggota = Anggota::all();

         return view('simpanan.update', [
             'simpanan' => $simpanan,
             'anggota' => $anggota
         ]);
     }

     public function update(simpananRequestUpdate $request, $kode_simpanan_debet)
     {
         
         $data = $request->validated();
     
         DB::beginTransaction();
     
         try {
             // Temukan data simpanan berdasarkan kode simpanan debet
             $simpanan = simpanan::find($kode_simpanan_debet);
     
             // Jika data simpanan tidak ditemukan, kembalikan respons dengan kode status 404
             if (!$simpanan) {
                 return response()->json([
                     "code" => 404,
                     "status" => "Error",
                     "message" => "Simpanan not found"
                 ], 404);
             }
     
             // Update kolom yang diperlukan
             $simpanan->anggota_kode = $data['anggota_kode'];      
             $simpanan->tanggal = $data['tanggal'];      
             $simpanan->jenis_pembayaran = $data['jenis_pembayaran'];      
             $simpanan->transaksi = $data['transaksi'];      
             $simpanan->divisi = $data['divisi'];      
             $simpanan->status_buku = $data['status_buku'];      
     
             // Simpan perubahan
             $simpanan->save();
     
             // Commit transaksi database
             DB::commit();
     
             // Redirect dengan pesan sukses
             return redirect(route('simpanan.index'))->with('success', 'Simpanan has been updated');
         } catch (Exception $e) {
             // Rollback transaksi database jika terjadi kesalahan
             DB::rollBack();
     
             // Log pesan kesalahan
             info($e->getMessage());
     
             // Kembalikan respons dengan kode status 412 dan pesan kesalahan
             return response()->json([
                 "code" => 412,
                 "status" => "Error",
                 "message" => $e->getLine() . ' ' . $e->getMessage()
             ], 412);
         }
     }
     
    

    public function delete(Request $request, $kode_simpanan_debet)
    {
        // Cari user berdasarkan ID
        $Simpanan = simpanan::find($kode_simpanan_debet);
   
        // Jika user tidak ditemukan
        if (!$Simpanan) {
            return response()->json(['message' => 'Simpanan not found'], 404);
        }
   
        // Hapus user
        $Simpanan->delete();
   
        return redirect(route('simpanan.index'))->with('succes', 'Simpanan has been delete');
   
        return response()->json(['message' => 'Simpanan deleted successfully'], 200);
    }
}
