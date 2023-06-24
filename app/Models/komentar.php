<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class komentar extends Model
{
    use HasFactory;
    protected $table = 'komentar';
    protected $primarykey = 'id_komentar';
    protected $fillable = ['user_id', 'forum_id', 'konten', 'parent'];

    public function User()
    {
        return $this->belongsTo(User::class, 'user_id', 'id_user');
    }
    public function forum()
    {
        return $this->belongsTo(forum::class, 'forum_id', 'id_forum');
    }
}
