<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;

class Question extends Model
{
    use HasFactory;

    protected $fillable = [
        'type',
        'instruction',
        'content',
        'listening',
        'answer_a',
        'answer_b',
        'answer_c',
        'answer_d',
        'correct',
        'grammar',
        'tenses',
        'present_simple',
        'vocabulary',
        'business'
    ];
}
