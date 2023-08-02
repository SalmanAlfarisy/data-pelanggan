<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MerkMobil extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_merk'
    ];

    // Hubungan One-to-Many dengan Model Pelanggan
    public function pelanggan()
    {
        return $this->hasMany(pelanggan::class, 'merk_id','id');
    }

    // Hubungan One-to-Many dengan Model Tipe Mobil
    public function typeMobil()
    {
        return $this->hasMany(TypeMobil::class, 'merk_id','id');
    }
    
}
