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
        'role',
        'jenis_kelamin',
        'alamat',
        'asal_sekolah',
        'kelas',
        'pekerjaan_ortu',
        'suku',
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

    // Relasi User ke Skor (one-to-many)
    public function skors()
    {
        return $this->hasMany(\App\Models\Skor::class);
    }
}
