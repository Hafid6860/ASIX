<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'bidang',
        'role',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    // Relasi dengan pesan yang ditujukan untuk bidang ini
    public function messages()
    {
        return $this->hasMany(Message::class, 'tujuan', 'bidang');
    }

    // Check apakah user adalah admin
    public function isAdmin()
    {
        return $this->role === 'admin';
    }

    // Check apakah user adalah bidang tertentu
    public function isBidang($bidang = null)
    {
        if ($bidang) {
            return $this->role === 'bidang' && $this->bidang === $bidang;
        }
        return $this->role === 'bidang';
    }
}
