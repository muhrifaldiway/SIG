<?php

// app/Models/Sebaran.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sebaran extends Model
{
    use HasFactory;

    protected $table = 'sebaran';

    protected $fillable = [
        'satwa_id',
        'kawasan_id',
        'user_id',
        'tanggal',
        'jumlah',
        'keterangan',
        'latitude',
        'longitude',
    ];

    public function satwa()
    {
        return $this->belongsTo(SatwaEndemik::class);
    }

    public function kawasan()
    {
        return $this->belongsTo(KawasanKonservasi::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
