<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Statistics extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'name',
        'general_correct',
        'general_incorrect',
        'cat_tenses_correct',
        'cat_tenses_incorrect',
        'cat_grammar_correct',
        'cat_grammar_incorrect',

    ];


    public function users()
    {
        $this->belongsTo(User::class, 'user_id', 'id');
    }


}
