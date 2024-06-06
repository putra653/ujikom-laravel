<?php

namespace App\Http\Controllers\back;

use App\Http\Controllers\Controller;
use App\Http\Requests\SettingRequestUpdate;
use App\Models\Setting;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class settingController extends Controller
{

    public function index() {
        $setting = Setting::first();
     
         return view('setting.index', [
             'setting' => $setting
         ]);
     }

    public function update(SettingRequestUpdate $request,$id){

       
        $data = $request->validated();



        DB::beginTransaction();
        try {
            if ($request->hasFile('foto_perusahaan')) {
                $checkingFile  = $request->file('foto_perusahaan');
                $filename = $checkingFile->getClientOriginalName();
                $path = $checkingFile->storeAs('public/back/setting', $filename); 
                $data ['foto_perusahaan'] = $filename;
             }
                $setting = Setting::find($id);
                $setting -> update($data);
                DB::commit();

                return redirect(route('setting.index'))->with('succes','Setting has been Update');
        }catch(Exception $i) {
            info($i->getMessage());
            DB::rollback();

            return response()->json([
                'code'=>412,
                'status'=>'error',
                'message'=> $i->getLine(). ' ' . $i->getMessage()
            ]);
            
        }
        dd($request->all());
    }










   
    //  public function update(SettingRequestUpdate $request, $id){
    //     $data = $request->validate();

    //         $setting = Setting::find($id);
    //     if ($request->hasFile('foto_perusahaan')) {
    //         Storage::delete('Logo/'.$setting->foto,);

    //     $foto = $request->file('foto_perusahaan');
    //     $fotoname = time() . '_' . $foto->getClientOriginalName();
    //     $foto ->storeAs('Logo',$fotoname,'public');
    //     $data['foto'] = $fotoname;
    // }

    //     Setting::find($id)->update($data);
    //     return redirect(route('setting.index'))->with('succes', 'User has been Update');
    //  }
}
