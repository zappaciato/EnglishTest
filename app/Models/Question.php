<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
use Illuminate\Support\Facades\Log;

class Question extends Model
{
    use HasFactory;

    protected $fillable = [
        
        'type',
        'level',
        'instruction',
        'content',
        'listening',
        
    ];

    public function categories()
    {
        $this->hasOne(Category::class, 'category_id', 'id');
    }

    public function answers()
    {
        $this->hasOne(Answer::class, 'answer_id', 'id');
    }

    public function results()
    {
        $this->hasOne(Result::class, 'result_id', 'id');
    }
}
