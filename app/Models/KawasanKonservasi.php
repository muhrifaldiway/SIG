<?php

// app/Models/KawasanKonservasi.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KawasanKonservasi extends Model
{
    use HasFactory;

    protected $table = 'kawasan_konservasi';

    protected $fillable = [
        'nama_kawasan',
        'lokasi',
        'deskripsi',
    ];

    public function sebaran()
    {
        return $this->hasMany(Sebaran::class);
    }
}

