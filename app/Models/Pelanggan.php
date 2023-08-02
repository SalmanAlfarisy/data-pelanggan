<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class pelanggan extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'nik',
        'no_telpon',
        'no_kk',
        'alamat',
        'img_npwp',
        'img_ktp',
        'img_kk',
        'buku_nikah',
        'merk_id',
        'type_id',
    ];

    // Jika kolom created_at dan updated_at ada pada tabel
    public $timestamps = true;

    // Hubungan Many-to-One dengan Model Merk Mobil
    public function merkMobil()
    {
        return $this->belongsTo(MerkMobil::class, 'merk_id','id');
    }

    // Hubungan Many-to-One dengan Model Tipe Mobil
    public function typeMobil()
    {
        return $this->belongsTo(TypeMobil::class, 'type_id','id');
    }
}
