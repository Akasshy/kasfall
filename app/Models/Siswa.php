<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    protected $guarded = [

    ];

    public function pemasukan(){
        return $this->hasMany(Pemasukan::class);
    }

    
    use HasFactory;
}
