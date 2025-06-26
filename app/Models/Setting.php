<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    // Jika tidak memakai kolom 'created_at' dan 'updated_at'
    public $timestamps = true;

    // Field yang boleh diisi massal
    protected $fillable = [
        'durasi_menit',
    ];
}
