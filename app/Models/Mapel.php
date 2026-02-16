<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mapel extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_mapel'
    ];

    // Relasi ke Siswa
    public function siswas()
{
    return $this->belongsToMany(Siswa::class, 'mapel_siswa');
}

}
