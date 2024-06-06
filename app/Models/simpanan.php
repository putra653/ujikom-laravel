<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class simpanan extends Model
{
    use HasFactory;

    protected $table = 'simpanan'; 
    protected $primaryKey = 'kode_simpanan_debet';
    protected $keyType = 'string';
    public $incrementing = false;



    protected $fillable = [
        'kode_simpanan_debet',
        'anggota_kode',
        'tanggal',
        'jenis_pembayaran',

        'divisi',
        'nominal',
        'keterangan',
        'status_buku',
        'status'
    ];

    public function anggota()
    {
        return $this->belongsTo(Anggota::class, 'anggota_kode', 'kode_anggota');
    }
}
