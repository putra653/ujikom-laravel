<?php

namespace App\Http\Controllers\back;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PhpParser\Node\Stmt\ElseIf_;

class loginController extends Controller
{   
    function login(Request $request){
        $request->validate([
            'email'=>'required|email',
            'password'=>'required'
        ],[
            'email.required'=>'Email Wajib Diisi',
            'email.email'=>'Email harus dalam format yang benar',
            'password.required'=>'Password Wajib Diisi',
        ]);
    
        $infologin = [
            'email'=>$request->email,
            'password'=>$request->password,
        ];
    
        if(Auth::attempt($infologin)){
            if(Auth::user()->role == 'admin'){
                return redirect('admin');
            } elseif(Auth::user()->role == 'manager'){
                return redirect('manager');
            } elseif(Auth::user()->role == 'supervisor'){
                return redirect('supervisor');
            } elseif(Auth::user()->role == 'petugas'){
                return redirect('petugas');
            } else {
                return redirect('')->withErrors('Username Dan Password Yang Dimasukan Tidak Sesuai')->withInput();
            }
        } else {
            return redirect('login');
        }
    }
    public function logout(){
        Auth::logout();
        return redirect('login');
    }
}