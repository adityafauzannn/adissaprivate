<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    use HasFactory;
    protected $fillable = ['siswa_id','feedback','tanggal'];

    public function siswa() {
        return $this->belongsTo(Siswa::class);
    }
}
