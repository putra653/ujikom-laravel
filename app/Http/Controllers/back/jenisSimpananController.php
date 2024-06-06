<?php

namespace App\Http\Controllers\back;

use App\Http\Controllers\Controller;
use App\Models\jenisSimpanan;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class jenisSimpananController extends Controller
{
    public function index() {
        $Jenis_simpanan = jenisSimpanan::all();
    
        return view('jenis_simpanan.index', [
            'jenis_simpanan' => $Jenis_simpanan
        ]);
    }   

    public function create(){
        $Jenis_simpanan = jenisSimpanan::get();

        return view('jenis_simpanan.create', [
            'jenis_simpanan' => $Jenis_simpanan
        ]);
    }

    public function store(Request $request){
        $data = $request->validate([
            'kode_jenis_simpanan' => 'required|max:10',
            'nama' => 'required|max:70',
            'nominal' => 'nullable|max:11'
        ]);
        DB::beginTransaction();

        try{
            jenisSimpanan::create($data);

            DB::commit();

            return redirect(route('jenis_simpanan.index'))->with('succes','Jenis Simpanan has been created');

        }catch(Exception $e){
            info($e->getMessage());
            DB::rollBack();

            return response()->json([
                "code"=>412,
                "status"=>"Error",
                'message'=> $e->getLine(). ' ' . $e->getMessage()
            ]);
        }
    }


    public function invoice() {
        $Jenis_simpanan = jenisSimpanan::get();
    
        return view('jenis_simpanan.invoice', [
            'jenis_simpanan' => $Jenis_simpanan
        ]);
    }

    public function edit($kode_jenis_simpanan)
    {
        $jenis_simpanan = jenisSimpanan::find($kode_jenis_simpanan); // Assuming you retrieve $jenis_simpanan from your model
        return view('jenis_simpanan.update', compact('jenis_simpanan'));
    }

    public function update(Request $request, $kode_jenis_simpanan) {
        $data = $request->validate([
            'kode_jenis_simpanan' => 'nullable|max:25',
            'nama' => 'nullable',
            'nominal' => 'nullable',
        ]);
    
        try {
            jenisSimpanan::find($kode_jenis_simpanan)->update($data);
            return redirect(route('jenis_simpanan.index'))->with('success', 'Jenis Simpanan has been updated');
        } catch(Exception $e) {
            info($e->getMessage());
            return back()->withInput()->with('error', $e->getMessage());
        }
    }
    

    public function delete(Request $request, $kode_jenis_simpanan)
    {
        // Cari user berdasarkan ID
        $Jenis_simpanan = jenisSimpanan::find($kode_jenis_simpanan);
   
        // Jika user tidak ditemukan
        if (!$Jenis_simpanan) {
            return response()->json(['message' => 'Jenis Simpanan not found'], 404);
        }
   
        // Hapus user
        $Jenis_simpanan->delete();
   
        return redirect(route('jenis_simpanan.index'))->with('succes', 'Jenis Simpanan has been delete');
   
        return response()->json(['message' => 'Jenis Simapanan deleted successfully'], 200);
    }

}
