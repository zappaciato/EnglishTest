<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Question;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'grammar',
        'tenses',
        'present_simple',
        'vocabulary',
        'business',
        'question_id'
    ];

    public function questions()
    {
        return $this->belongsTo(Question::class, 'question_id', 'id');
    }
}
