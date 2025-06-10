<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReasonsTable extends Migration
{
    public function up()
    {
        Schema::create('reasons', function (Blueprint $table) {
            $table->id();
            $table->foreignId('question_id')->constrained()->onDelete('cascade');
            $table->string('alasan');          // teks alasan
            $table->json('opsi');              // opsi a-e
            $table->char('jawaban_benar');     // a/b/c/d/e
            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::dropIfExists('reasons');
    }
}
