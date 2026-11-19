<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddJurusanIdToMahasiswasTable extends Migration
{
    public function up()
    {
        Schema::table('mahasiswas', function (Blueprint $table) {
            $table->integer('jurusan_id')->unsigned()->nullable()->after('jurusan');
            $table->index('jurusan_id');
        });
    }

    public function down()
    {
        Schema::table('mahasiswas', function (Blueprint $table) {
            $table->dropIndex(['jurusan_id']);
            $table->dropColumn('jurusan_id');
        });
    }
}
