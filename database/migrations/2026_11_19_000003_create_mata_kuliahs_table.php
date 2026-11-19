<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMataKuliahsTable extends Migration
{
    public function up()
    {
        Schema::create('mata_kuliahs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('kode')->unique();
            $table->string('nama');
            $table->integer('sks');
            $table->integer('semester');
            $table->integer('jurusan_id')->unsigned()->nullable();
            $table->timestamps();
            $table->index('jurusan_id');
        });
    }

    public function down()
    {
        Schema::dropIfExists('mata_kuliahs');
    }
}
