<?php
use App\Http\Controllers\back\adminController;
use App\Http\Controllers\back\anggotaController;
use App\Http\Controllers\back\jenisSimpananController;
use App\Http\Controllers\back\landingpageController;
use App\Http\Controllers\back\loginController;
use App\Http\Controllers\back\pinjamanController;
use App\Http\Controllers\back\saldoController;
use App\Http\Controllers\back\settingController;
use App\Http\Controllers\back\simpananController as BackSimpananController;
use App\Http\Controllers\back\usersController;
use App\Http\Controllers\simpananController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Route;

Route::middleware(['guest'])->group(function(){
    Route::get('/login', [loginController::class, 'index'])->name('login');
    Route::post('/login', [loginController::class, 'login'])->name('login.index'); // Anda mungkin ingin mengubah nama rute ini menjadi 'login.post' atau sesuai dengan kebutuhan.
    Route::get('/login', function () {return view('/login.index');});
});




Route::middleware(['auth'])->group(function(){
   Route::get('/admin',[adminController::class,'index'])->name('admin')->middleware('userAkses:admin');
   Route::get('/manager',[adminController::class,'index'])->middleware('userAkses:manager');
   Route::get('/supervisor',[adminController::class,'index'])->middleware('userAkses:supervisor');
   Route::get('/petugas',[adminController::class,'index'])->middleware('userAkses:petugas');
   Route::get('logout', [loginController::class, 'logout'])->name('logout');
});


Route::get('/', [landingpageController::class, 'index']);

//pegawai
Route::get('/pegawai',[usersController::class,'index'])->name('pegawai.index');
Route::get('/pegawai/invoice',[usersController::class,'invoice'])->name('pegawai.invoice');
Route::get('/pegawai/create',[usersController::class,'create'])->name('tambah');
Route::get('/pegawai/edit/{id}',[usersController::class,'edit'])->name('edit.pegawai');
Route::post('/pegawai/store',[usersController::class,'store'])->name('store.pegawai');
Route::post('/pegawai/update/{id}',[usersController::class,'update'])->name('update.pegawai');
Route::post('/pegawai/delete/{id}',[usersController::class,'delete'])->name('delete.pegawai');
//end pegawai

//setting
Route::get('/setting',[settingController::class,'index'])->name('setting.index');
Route::post('/update.setting/{id}',[settingController::class,'update'])->name('update.setting');
//end setting


//anggota
Route::get('/anggota',[anggotaController::class,'index'])->name('anggota.index');
Route::get('/anggota/invoice',[anggotaController::class,'invoice'])->name('anggota.invoice');
Route::get('/anggota/create',[anggotaController::class,'create'])->name('anggota.tambah');
Route::get('/anggota/edit/{kode_anggota}',[anggotaController::class,'edit'])->name('edit.anggota');
Route::post('/anggota/store',[anggotaController::class,'store'])->name('store.anggota');
Route::post('/anggota/update/{kode_anggota}',[anggotaController::class,'update'])->name('update.anggota');
Route::post('/anggota/delete/{kode_anggota}',[anggotaController::class,'delete'])->name('delete.anggota');
//end anggota

//simpanan
Route::get('/simpanan',[BackSimpananController::class,'index'])->name('simpanan.index');
Route::get('/simpanan/invoice',[BackSimpananController::class,'invoice'])->name('simpanan.invoice');
Route::get('/simpanan/create',[BackSimpananController::class,'create'])->name('simpanan.tambah');
Route::post('/simpanan/store',[BackSimpananController::class,'store'])->name('store.simpanan');
Route::get('/simpanan/edit/{kode_simpanan}',[BackSimpananController::class,'edit'])->name('edit.simpanan');
Route::post('/simpanan/update/{kode_simpanan}',[BackSimpananController::class,'update'])->name('update.simpanan');
Route::post('/simpanan/delete/{kode_simpanan}',[BackSimpananController::class,'delete'])->name('delete.simpanan');
//end simpanan

//jenis simpanan
Route::get('/jenis_simpanan',[jenisSimpananController::class,'index'])->name('jenis_simpanan.index');
Route::get('/jenis_simpanan/invoice',[jenisSimpananController::class,'invoice'])->name('jenis_simpanan.invoice');
Route::get('/jenis_simpanan/create',[jenisSimpananController::class,'create'])->name('jenis_simpanan.tambah');
Route::post('/jenis_simpanan/store',[jenisSimpananController::class,'store'])->name('store.jenis_simpanan');
Route::get('/jenis_simpanan/edit/{kode_jenis_simpanan}',[jenisSimpananController::class,'edit'])->name('edit.jenis_simpanan');
Route::post('/jenis_simpanan/update/{kode_jenis_simpanan}',[jenisSimpananController::class,'update'])->name('update.jenis_simpanan');
Route::post('/jenis_simpanan/delete/{kode_jenis_simpanan}', [JenisSimpananController::class, 'delete'])->name('delete.jenis_simpanan');

//end jenis simpanan


//pinjaman
Route::get('/pinjaman',[pinjamanController::class,'index'])->name('pinjaman.index');
Route::get('/pinjaman/invoice',[pinjamanController::class,'invoice'])->name('pinjaman.invoice');
Route::get('/pinjaman/create',[pinjamanController::class,'create'])->name('pinjaman.tambah');


Route::post('/pinjaman/delete/{kode_pinjaman}',[pinjamanController::class,'delete'])->name('delete.pinjaman');  
//end pinjaman

//saldo
Route::get('/saldo',[saldoController::class,'index'])->name('saldo.index');
Route::get('/saldo/invoice',[saldoController::class,'invoice'])->name('saldo.invoice');
//end saldo

//laporan


//endlaporan

// Route::get('/dashboard', function () {
//     $user = auth()->user();
//     if ($user->role == 'admin') {
//         return Redirect::route('admin');
//     } elseif ($user->role == 'manager') {
//         return Redirect::route('manager');
//     } elseif ($user->role == 'supervisor') {
//         return Redirect::route('supervisor');
//     } elseif ($user->role == 'petugas') {
//         return Redirect::route('petugas');
//     }
//      else {
//         return Redirect::redirect('login');
//     }
// })->name('dashboard');;


