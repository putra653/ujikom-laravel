<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pinjaman extends Model
{
    use HasFactory;

    protected $table = 'pinjaman'; 
    protected $primaryKey = 'kode_pinjaman';
    protected $keyType = 'string';
    public $incrementing = false;
}
