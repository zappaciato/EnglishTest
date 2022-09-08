<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Log;
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

        Schema::create('questions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('type');
            $table->longText('instruction');
            $table->longText('content')->unique();
            $table->string('listening')->nullable();
            $table->string('answer_a')->nullable();
            $table->string('answer_b')->nullable();
            $table->string('answer_c')->nullable();
            $table->string('answer_d')->nullable();
            $table->boolean('answer_true')->nullable();
            $table->char('correct', 1)->nullable();
            // categories
            $table->boolean('grammar')->default(0);
            $table->boolean('tenses')->default(0);
            $table->boolean('present_simple')->default(0);
            $table->boolean('vocabulary')->default(0);
            $table->boolean('business')->default(0);

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
        Schema::dropIfExists('questions');
    }
};
