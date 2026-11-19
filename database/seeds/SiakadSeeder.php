<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SiakadSeeder extends Seeder
{
    public function run()
    {
        if (DB::table('jurusans')->where('kode', 'SEEDJ0001')->exists()) {
            throw new RuntimeException(
                'Seeder SIAKAD sudah pernah dijalankan. Untuk mengulang, reset database pengembangan terlebih dahulu.'
            );
        }

        $faker = Faker\Factory::create();
        $now = date('Y-m-d H:i:s');
        $rows = [];

        for ($i = 1; $i <= 1000; $i++) {
            $kode = sprintf('SEEDJ%04d', $i);
            $rows[] = [
                'kode' => $kode,
                'nama' => 'Jurusan Seeder ' . sprintf('%04d', $i),
                'keterangan' => 'Data contoh untuk pengujian.',
                'created_at' => $now,
                'updated_at' => $now,
            ];
        }
        $this->insertInChunks('jurusans', $rows);

        $jurusanIds = [];
        $jurusanNama = [];
        foreach (DB::table('jurusans')->get(['id', 'nama']) as $jurusan) {
            $jurusanIds[] = $jurusan->id;
            $jurusanNama[$jurusan->id] = $jurusan->nama;
        }

        $password = bcrypt('SiaKad123!');
        $rows = [];
        for ($i = 1; $i <= 1000; $i++) {
            $rows[] = [
                'name' => $faker->name,
                'email' => sprintf('seed-user-%04d@example.test', $i),
                'password' => $password,
                'remember_token' => null,
                'created_at' => $now,
                'updated_at' => $now,
            ];
        }
        $this->insertInChunks('users', $rows);

        $rows = [];
        for ($i = 1; $i <= 1000; $i++) {
            $jurusanId = $jurusanIds[array_rand($jurusanIds)];
            $rows[] = [
                'nidn' => sprintf('SEED%06d', $i),
                'nama' => $faker->name,
                'email' => sprintf('seed-dosen-%04d@example.test', $i),
                'jurusan_id' => $jurusanId,
                'created_at' => $now,
                'updated_at' => $now,
            ];
        }
        $this->insertInChunks('dosens', $rows);

        $rows = [];
        for ($i = 1; $i <= 1000; $i++) {
            $jurusanId = $jurusanIds[array_rand($jurusanIds)];
            $rows[] = [
                'nama' => $faker->name,
                'nim' => sprintf('SEED2026%06d', $i),
                'jurusan' => $jurusanNama[$jurusanId],
                'jurusan_id' => $jurusanId,
                'created_at' => $now,
                'updated_at' => $now,
            ];
        }
        $this->insertInChunks('mahasiswas', $rows);

        $rows = [];
        for ($i = 1; $i <= 1000; $i++) {
            $rows[] = [
                'kode' => sprintf('SEEDMK%06d', $i),
                'nama' => 'Mata Kuliah Seeder ' . sprintf('%04d', $i),
                'sks' => rand(1, 4),
                'semester' => rand(1, 8),
                'jurusan_id' => $jurusanIds[array_rand($jurusanIds)],
                'created_at' => $now,
                'updated_at' => $now,
            ];
        }
        $this->insertInChunks('mata_kuliahs', $rows);
    }

    private function insertInChunks($table, array $rows)
    {
        foreach (array_chunk($rows, 250) as $chunk) {
            DB::table($table)->insert($chunk);
        }
    }
}
