<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pertemuan extends Model
{
    protected $fillable = [
        'siswa_id',
        'pertemuan_ke',
        'tanggal'
    ];

    public function nilais()
    {
        return $this->hasMany(Nilai::class);
    }

    public function evaluasi()
    {
        return $this->hasOne(Evaluasi::class);
    }
    public function siswa()
{
    return $this->belongsTo(Siswa::class);
}
    
}
