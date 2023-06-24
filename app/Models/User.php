<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Models\quiz;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'users';
    protected $primaryKey = 'id_user';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'username',
        'role_id',
        'email',
        'password',
        'jenis_kelamin',
        'gambar',
        'bio',
        'skor',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function role()
    {
        return $this->belongsTo(role::class, 'role_id', 'id_role');
    }
    public function forum()
    {
        return $this->hasMany(forum::class, 'user_id', 'id_user');
    }
    public function quiz()
    {
        return $this->hasMany(quiz::class);
    }
    public function feedback()
    {
        return $this->belongsTo(User::class, 'user_id', 'id_user');
    }
}
