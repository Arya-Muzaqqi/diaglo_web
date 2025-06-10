<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Reason;

class Question extends Model
{
    use HasFactory;

    protected $fillable = ['pertanyaan', 'media', 'opsi', 'jawaban_benar'];

    protected $casts = [
        'opsi' => 'array',
    ];

    public function reason()
    {
        return $this->hasOne(Reason::class);
    }
}
