<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('statistics', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('name');
            $table->integer('general_correct');
            $table->integer('general_incorrect');
            $table->integer('cat_tenses_correct');
            $table->integer('cat_tenses_incorrect');
            $table->integer('cat_grammar_correct');
            $table->integer('cat_grammar_incorrect');
            $table->integer('cat_vocabulary_correct');
            $table->integer('cat_vocabulary_incorrect');
            $table->integer('cat_business_correct');
            $table->integer('cat_business_incorrect');
            $table->integer('cat_present_simple_correct');
            $table->integer('cat_present_simple_incorrect');

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('statistics');
    }
};
