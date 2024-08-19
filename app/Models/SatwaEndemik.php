<?php

// app/Models/SatwaEndemik.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SatwaEndemik extends Model
{
    use HasFactory;

    protected $table = 'satwa_endemik';

    protected $fillable = [
        'nama_latin',
        'nama_umum',
        'deskripsi',
        'gambar',
    ];

    public function sebaran()
    {
        return $this->hasMany(Sebaran::class);
    }
}
