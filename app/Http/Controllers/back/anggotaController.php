<?php

namespace App\Http\Controllers\back;

use App\Http\Controllers\Controller;
use App\Http\Requests\anggotaUpdateRequest;
use App\Models\anggota;
use App\Models\jenisSimpanan;
use App\Models\saldo;
use App\Models\simpanan;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Spatie\LaravelIgnition\Http\Requests\UpdateConfigRequest;

class anggotaController extends Controller
{
    public function index() {
        $anggota = anggota::get();
    
        return view('anggota.index', [
            'anggota' => $anggota
        ]);
    }   
    public function invoice() {
        $anggota = anggota::get();
    
        return view('anggota.invoice', [
            'anggota' => $anggota
        ]);
    }

    public function create(){
        $jenis = jenisSimpanan::get();

        return view('anggota.create', [
            'jenis' => $jenis
        ]);
    }
    

    public function store(Request $request){
        $data = $request->all();
        $data ['status'] = 1 ;
        $props = $data['nominal'];
            if(is_array($props) && !empty($props)){
                if (array_filter($props,'is_numeric')=== $props) {
                    $totalProps = array_sum($props);
                }else {
                    $totalProps = 0;
                }
            }else {
                $totalProps = 0;
            }
            

        DB::beginTransaction();
        try{
            $kode_anggota = autonumber('anggota','kode_anggota', 3 , 'ANG');
            $data['kode_anggota'] = $kode_anggota;
            $kode_simpanan_debet = autonumber('simpanan', 'kode_simpanan_debet', 3 , 'SIM');
            $data['kode_simpanan_debet'] = $kode_anggota;


            $anggota = new anggota();
            $anggota->kode_anggota = $kode_anggota;
            $anggota->nik = $data['nik'];
            $anggota->nama = $data['nama'];
            $anggota->alamat = $data['alamat'];
            $anggota->email = $data['email'];
            $anggota->telepon = $data['telepon'];
            $anggota ['status'] = 1;
            $anggota->save();



            $simpanan = new simpanan();
            $simpanan->kode_simpanan_debet = $kode_simpanan_debet;
            $simpanan->anggota_kode = $kode_anggota;
            $simpanan->tanggal = $data['tanggal'];
            $simpanan->jenis_pembayaran = $data['jenis_pembayaran'];
            $simpanan->transaksi = $data['transaksi'];
            $simpanan->divisi = $data['divisi'];
            
            // Mengonversi array menjadi string JSON
            $propsJson = json_encode($props);
            $simpanan->nominal = $propsJson;
            
            $simpanan->keterangan = $data['keterangan'];
            $simpanan->status_buku = $data['status_buku'];
            $simpanan ['status'] = 1;
            $simpanan->save();
            

            $saldokoprasi = new saldo();
            $saldokoprasi->saldo = $totalProps;
            $saldokoprasi->keterangan = $data['keterangan'];
            $saldokoprasi->status = '1';
            $saldokoprasi->save();
            
            DB::commit();

            return redirect(route('anggota.index'))->with('succes','Anggota has been created');
        } catch(Exception $e){
            $errorMessage = $e->getMessage();
            info($errorMessage);
            Log::error('Error while storing data :' . $errorMessage);

        DB::rollBack();

            return response()->json([
                "code" => 412,
                "status" => "Error",
                "message" => $e->getLine() . ' ' . $e->getMessage()
            ]);
        }
    }

    public function edit($kode_anggota){
        $anggota = anggota::find($kode_anggota);
       return view('anggota.update', compact("anggota"));
    }

    public function update(anggotaUpdateRequest $request, $kode_anggota)
{
    $data = $request->validated();

    

    DB::beginTransaction();

    try {
        $anggota = Anggota::find($kode_anggota); // Use $kode_anggota to find the specific record
        if (!$anggota) {
            return response()->json([
                "code" => 404,
                "status" => "Error",
                "message" => "Anggota not found"
            ], 404);
        }

        $anggota->update($data);

        DB::commit();

        return redirect(route('anggota.index'))->with('success', 'Anggota has been updated');

    } catch (Exception $e) {
        info($e->getMessage());
        DB::rollBack();

        return response()->json([
            "code" => 412,
            "status" => "Error",
            "message" => $e->getLine() . ' ' . $e->getMessage()
        ], 412);
    }
}


    public function delete(Request $request, $kode_anggota)
 {
     // Cari user berdasarkan ID
     $Anggota = anggota::find($kode_anggota);

     // Jika user tidak ditemukan
     if (!$Anggota) {
         return response()->json(['message' => 'Anggota not found'], 404);
     }

     // Hapus user
     $Anggota->delete();

     return redirect(route('anggota.index'))->with('succes', 'Anggota has been delete');

     return response()->json(['message' => 'User deleted successfully'], 200);
 }
 
}
