<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDosensTable extends Migration
{
    public function up()
    {
        Schema::create('dosens', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nidn')->unique();
            $table->string('nama');
            $table->string('email')->nullable()->unique();
            $table->integer('jurusan_id')->unsigned()->nullable();
            $table->timestamps();
            $table->index('jurusan_id');
        });
    }

    public function down()
    {
        Schema::dropIfExists('dosens');
    }
}
