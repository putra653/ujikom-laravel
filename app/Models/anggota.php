<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Anggota extends Model
{
    use HasFactory;

    protected $table = 'anggota'; 
    protected $primaryKey = 'kode_anggota';
    protected $keyType = 'string';
    public $incrementing = false; 

 

    protected $fillable = [
        'kode_anggota',
        'nik',
        'nama',
        'nominal',
        'alamat',
        'email',
        'telepon',
        'status'
    ];

    public function simpanan()
    {
        return $this->hasMany(Simpanan::class, 'kode_anggota', 'kode_anggota');
    }
    
}

