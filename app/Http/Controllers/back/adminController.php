<?php

namespace App\Http\Controllers\back;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class adminController extends Controller
{
   public function index(){
    return view('admin.admin');
   }
   public function manager(){
      return view('manager.index');
     }
   public function supervisor(){
    return view('supervisor.index');
   }
   public function petugas(){
    return view('petugas.index');
   }
}
