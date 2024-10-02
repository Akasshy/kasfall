<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pemasukan extends Model
{
    use HasFactory;
    protected $fillable = [
        // 'nama_siswa',
        'jumlah_pemasukan',
        'tanggal_pemasukan',
    ];

    // protected $guarded = [];
    public function pengeluaran(){
        return $this->hasMany(Pengeluaran::class);
    }

    public function siswa(){
        return $this->belongsTo(Siswa::class, 'id');
    }
}
