<?php

namespace App\Http\Controllers\back;

use App\Http\Controllers\Controller;
use App\Http\Requests\Request\UserRequestUpdate;
use App\Http\Requests\UserRequest;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\DB;

class usersController extends Controller
{
public function index() {
    $users = User::get();

    return view('pegawai.index', [
        'users' => $users
        
    ]);
}
public function invoice() {
    $users = User::get();

    return view('pegawai.invoice', [
        'users' => $users
        
    ]);
}


public function create() {

    return view('pegawai.create',[
    ]);
}

public function store(Request $request) {
        $data = $request->validate([
            'name' => 'required|max:25',
            'email' => 'required|',
            'alamat' => 'required',
            'telepon' => 'required|string|max:255',
            'role' => 'required',
            'foto_profile'          => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'password' => 'sometimes|required|string|min:8|confirmed',
            'password_confirmation' => 'sometimes|required|min:8'
        ]);

        DB::beginTransaction();

        try {
            if ($request->hasFile('foto_profile')) {
                $checkingFile =$request->file('foto_profile');
                $filename = $checkingFile->getClientOriginalName();
                $path = $checkingFile->storeAs('public/back/foto-profile',$filename);
                $data ['foto_profile'] = $filename;
            }

            $data ['password'] = bcrypt($data['password']);
            $user = User::create($data);
            
            DB::commit();

            
            return redirect(route('pegawai.index'))->with('succes', 'User has been created');
        }catch(Exception $e) {
            info($e->getMessage());
            DB::rollBack();

            return response()->json([
                "code" => 412,
                "status" => "Error",
                "message" => $e->getLine() . ' ' . $e->getMessage()
            ]);
        }
}

        public function edit($id){
            $levels = User::distinct('level') ->pluck('role');
            $users = User::find($id);

            return view('pegawai.update',[
                'users' => User::find($id),
                
            ]);
        }

 public function update(Request $request,$id_user) {
    $data = $request->validate([
        'name' => 'nullable|max:25',
        'email' => 'nullable|',
        'alamat' => 'nullable',
        'telepon' => 'nullable|string|max:255',
        'role' => 'nullable',
        'foto_profile'          => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        'password' => 'sometimes|nullable|string|min:8|confirmed',
        'password_confirmation' => 'sometimes|nullable|min:8'
    ]);
        try {
            if ($request->hasFile('foto_profile')) {
                $checkingFile =$request->file('foto_profile');
                $filename = $checkingFile->getClientOriginalName();
                $path = $checkingFile->storeAs('public/back/foto-profile',$filename);
                $data ['foto_profile'] = $filename;
            }
            if($request->filled('password')){
                $data['password'] = bcrypt($data['password']);
            }else{
                unset($data['password']);
                unset($data['password_confirmation']);               
            }
            User::find($id_user)->update($data);
            return redirect(route('pegawai.index'))->with('succes', 'User has been created');

            DB::commit();

            
            return redirect(route('pegawai.index'))->with('succes', 'User has been created');
        }catch(Exception $e) {
            info($e->getMessage());
            DB::rollBack();

            return response()->json([
                "code" => 412,
                "status" => "Error",
                "message" => $e->getLine() . ' ' . $e->getMessage()
            ]);
        }
 }



    
        
       
 

 public function delete(Request $request, $id)
 {
     // Cari user berdasarkan ID
     $user = User::find($id);

     // Jika user tidak ditemukan
     if (!$user) {
         return response()->json(['message' => 'User not found'], 404);
     }

     // Hapus user
     $user->delete();

     return redirect(route('pegawai.index'))->with('succes', 'User has been delete');

     return response()->json(['message' => 'User deleted successfully'], 200);
 }


}