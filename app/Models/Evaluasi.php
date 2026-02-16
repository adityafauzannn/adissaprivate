<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Evaluasi extends Model
{
    protected $fillable = [
        'siswa_id',
        'pertemuan_id',
        'tanggal',
        'catatan_guru'
    ];

    public function siswa()
    {
        return $this->belongsTo(Siswa::class);
    }
    public function pertemuan()
{
    return $this->belongsTo(Pertemuan::class);
}

}
