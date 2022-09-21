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
        Schema::create('categories', function (Blueprint $table) {
            // $table->bigIncrements('id');
            $table->unsignedBigInteger('question_id');

            // categories
            $table->boolean('grammar')->default(0);
            $table->boolean('tenses')->default(0);
            $table->boolean('present_simple')->default(0);
            $table->boolean('vocabulary')->default(0);
            $table->boolean('business')->default(0);
            
            $table->timestamps();

            $table->foreign('question_id')
                ->references('id')
                ->on('questions')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('categories');
    }
};
