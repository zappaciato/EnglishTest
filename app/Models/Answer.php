<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    use HasFactory;

    protected $fillable = [
        'answer_a',
        'answer_b',
        'answer_c',
        'answer_d',
    ];

    public function questions()
    {
        $this->belongsTo(Question::class, 'question_id', 'id');
    }

}
