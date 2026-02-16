<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'kelas',
        'alamat',
        'nama_orangtua',
        'kontak_orangtua',
        'foto'
    ];

    public function nilai()
    {
        return $this->hasMany(Nilai::class);
    }

    public function mapels()
    {
        return $this->belongsToMany(Mapel::class, 'mapel_siswa');
    }

    public function feedback()
    {
        return $this->hasMany(Feedback::class);
    }
    public function evaluasi()
{
    return $this->hasMany(Evaluasi::class);
}
public function pertemuans()
{
    return $this->hasMany(Pertemuan::class);
}

}
