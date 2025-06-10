<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reason extends Model
{
    use HasFactory;

    protected $fillable = ['question_id', 'alasan', 'opsi', 'jawaban_benar'];

    protected $casts = [
        'opsi' => 'array',
    ];

    public function question()
    {
        return $this->belongsTo(Question::class);
    }
}
