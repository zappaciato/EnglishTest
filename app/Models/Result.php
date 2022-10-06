<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Result extends Model
{
    use HasFactory;

    protected $fillable = [
        'question_id',
        'user_id',
        'user_answer',
        'correct',
        'level',
    ];

    public function questions()
    {
        $this->hasMany(Question::class, 'question_id', 'id');
    }

    public function users()
    {
        $this->hasMany(User::class, 'user_id', 'id');
    }
}
