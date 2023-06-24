<?php

namespace App\Models;

use App\Models\User;
use App\Models\kelas;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class forum extends Model
{
    use HasFactory;
    protected $table = 'forum';
    protected $primaryKey = 'id_forum';
    protected $fillable = ['judul_forum', 'kelas_id', 'pertanyaan_forum', 'user_id'];

    public function kelas()
    {
        return $this->belongsTo(kelas::class, 'kelas_id', 'id_kelas');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id_user');
    }
    public function scopeOrderByDate($query, $order = 'asc')
    {
        $query->orderBy('created_at', $order);
    }
    public function komentar()
    {
        return $this->hasMany(komentar::class, 'forum_id', 'id_forum');
    }
}
