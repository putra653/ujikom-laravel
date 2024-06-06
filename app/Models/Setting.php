<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;
    protected $table = 'pengaturan';
    protected $fillable = [
        'nama_perusahaan',
        'foto_perusahaan',
        'telepon',
        'nib',
        'web',
        'alamat',
        'kodepos',
        'batas_pinjam'
    ];  
}
