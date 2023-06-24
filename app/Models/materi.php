<?php

namespace App\Models;

use App\Models\kelas;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class materi extends Model
{
    use HasFactory;
    protected $table = 'materi';
    protected $primaryKey = 'id_materi';

    protected $fillable = [
        'judul_materi', 'isi_materi', 'kelas_id',
    ];

    public function kelas()
    {
        return $this->belongsTo(kelas::class, 'kelas_id', 'id_kelas');
    }
}
