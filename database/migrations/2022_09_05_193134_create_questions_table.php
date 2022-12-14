<?php

use App\Models\Category;
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
        Log::info('I am about to make questions table1');
        Schema::create('questions', function (Blueprint $table) {
            $table->id();
            $table->string('type');
            $table->string('level');
            $table->longText('instruction');
            $table->longText('content')->unique();
            $table->string('listening')->nullable();
            
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
