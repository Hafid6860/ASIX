<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'email',
        'kelas',
        'jurusan',
        'tujuan',
        'pesan',
        'status',
        'replied_by',
        'reply_message',
        'replied_at',
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
        'replied_at' => 'datetime',
    ];

    // Relasi dengan user yang membalas
    public function repliedBy()
    {
        return $this->belongsTo(User::class, 'replied_by');
    }

    // Scope untuk filter berdasarkan bidang
    public function scopeForBidang($query, $bidang)
    {
        return $query->where('tujuan', $bidang);
    }

    // Scope untuk status
    public function scopeWithStatus($query, $status)
    {
        return $query->where('status', $status);
    }
}
