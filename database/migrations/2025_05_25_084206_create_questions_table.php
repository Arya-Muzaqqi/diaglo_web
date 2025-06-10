<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuestionsTable extends Migration
{
    public function up()
    {
        Schema::create('questions', function (Blueprint $table) {
            $table->id();
            $table->string('pertanyaan');      // teks soal utama
            $table->string('media')->nullable(); // file gambar/video
            $table->json('opsi');              // jawaban a,b,c,d,e (format json)
            $table->char('jawaban_benar');     // a/b/c/d/e
            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::dropIfExists('questions');
    }
}
