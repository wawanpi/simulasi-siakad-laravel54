<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    protected $table = 'mahasiswas';

    protected $fillable = [
        'nama',
        'nim',
        'jurusan',
        'jurusan_id'
    ];

    public function jurusanData()
    {
        return $this->belongsTo(Jurusan::class, 'jurusan_id');
    }
}
