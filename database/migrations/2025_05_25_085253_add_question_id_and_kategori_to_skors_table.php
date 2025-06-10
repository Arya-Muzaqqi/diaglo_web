<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('skors', function (Blueprint $table) {
            $table->unsignedBigInteger('question_id')->nullable()->after('user_id');
            $table->string('kategori')->nullable()->after('nilai');
        });
    }

    public function down()
    {
        Schema::table('skors', function (Blueprint $table) {
            $table->dropColumn(['question_id', 'kategori']);
        });
    }

};
