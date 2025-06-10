<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuizSettingsTable extends Migration
{
    public function up()
    {
        Schema::create('quiz_settings', function (Blueprint $table) {
            $table->id();
            $table->string('key')->unique();    // misal: 'time_limit', 'passing_score', 'max_attempts'
            $table->string('value');            // nilainya bisa string, nanti di-cast sesuai kebutuhan
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('quiz_settings');
    }
}
