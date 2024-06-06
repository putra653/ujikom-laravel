<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class UserAkses
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $role)
    {
        if(auth()->user()->role == $role ){
            return $next($request);
        }
        
        // Jika rolenya bukan yang diizinkan, alihkan sesuai role yang diberikan
        if(auth()->user()->role == 'admin'){
            return redirect('admin');
        } elseif(auth()->user()->role == 'manager'){
            return redirect('manager');
        } elseif(auth()->user()->role == 'supervisor'){
            return redirect('supervisor');
        } elseif(auth()->user()->role == 'petugas'){
            return redirect('petugas');
        } else {
            // Jika role tidak ditemukan, Anda bisa mengembalikan respons default atau redirect ke halaman tertentu
            return redirect('admin');
        }
    }
    
}
