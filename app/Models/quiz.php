<?php

namespace App\Models;

use App\Models\User;
use App\Models\kelas;
use App\Models\Attempt;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class quiz extends Model
{
    protected $guarded = [];

    use HasFactory;
    protected $table = 'quiz';
    protected $primaryKey = 'id_quiz';
    protected $fillable = ['pertanyaan', 'jawaban'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
