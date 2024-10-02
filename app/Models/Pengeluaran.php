<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengeluaran extends Model
{
    protected $fillable = [
        'nama',
        // 'nama_pengeluaran',
        'jumlah_pengeluaran',
        'tanggal_pengeluaran'
    ];

    public function pemasukan(){
        return $this->hasMany(Pemasukan::class);
    }

    public function siswa(){
        return $this->belongsTo(Siswa::class, 'id');
    }



    use HasFactory;
}
