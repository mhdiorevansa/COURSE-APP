<?php

namespace App\Models;

use App\Models\materi;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Carbon\Carbon;
use Laravolt\Indonesia\Indonesia;

class kelas extends Model
{
    use HasFactory;

    protected $table = 'kelas';
    protected $primaryKey = 'id_kelas';

    protected $fillable = [
        'nama_kelas',
        'deskripsi_kelas',
        'tentang_kelas',
        'persiapan_kelas',
        'gambar_kelas',
    ];

    public function materi()
    {
        return $this->hasMany(materi::class, 'kelas_id', 'id_kelas');
    }
    public function forum()
    {
        return $this->hasMany(kelas::class, 'kelas_id', 'id_kelas');
    }
}
