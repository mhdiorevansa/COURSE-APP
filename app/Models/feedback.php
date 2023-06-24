<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class feedback extends Model
{
    use HasFactory;
    protected $table = 'feedback';
    protected $primaryKey = 'id_feedback';
    protected $fillable = [
        'user_id',
        'isi_feedback',
    ];
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id_user');
    }
}
