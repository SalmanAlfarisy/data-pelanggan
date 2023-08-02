<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TypeMobil extends Model
{
    use HasFactory;

    protected $fillable = [
        'merk_id',
        'type_mobil'
    ];

    // Hubungan One-to-Many dengan Model Pelanggan
    public function pelanggan()
    {
        return $this->hasMany(pelanggan::class, 'type_id','id');
    }

    // Hubungan Many-to-One dengan Model Merk Mobil
    public function merkMobil()
    {
        return $this->belongsTo(MerkMobil::class, 'merk_id','id');
    }
}
