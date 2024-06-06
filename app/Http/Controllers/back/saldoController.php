<?php

namespace App\Http\Controllers\back;

use App\Http\Controllers\Controller;
use App\Models\saldo;
use Illuminate\Http\Request;

class saldoController extends Controller
{
    
    public function index() {
        $saldo = saldo::get();
    
        return view('saldo.index', [
            'saldo' => $saldo
        ]);
    }  
    
    public function invoice() {
        $saldo = saldo::get();
    
        return view('saldo.invoice', [
            'saldo' => $saldo
        ]);
    } 
}
