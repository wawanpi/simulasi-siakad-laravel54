<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mahasiswa;
use App\Jurusan;

class MahasiswaController extends Controller
{
    public function index()
    {
        $mahasiswas = Mahasiswa::with('jurusanData')->orderBy('nama')->paginate(10);
        return view('mahasiswa.index', compact('mahasiswas'));
    }

    public function create()
    {
        $jurusans = Jurusan::orderBy('nama')->get();
        return view('mahasiswa.create', compact('jurusans'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'nama' => 'required|string|max:255',
            'nim' => 'required|string|max:50|unique:mahasiswas,nim',
            'jurusan_id' => 'required|exists:jurusans,id'
        ], [
            'nim.unique' => 'NIM sudah digunakan oleh mahasiswa lain.',
            'jurusan_id.required' => 'Jurusan wajib dipilih.'
        ]);

        $jurusan = Jurusan::findOrFail($request->jurusan_id);
        Mahasiswa::create([
            'nama' => $request->nama,
            'nim' => $request->nim,
            'jurusan' => $jurusan->nama,
            'jurusan_id' => $jurusan->id
        ]);

        return redirect('/mahasiswa')
            ->with('success', 'Data mahasiswa berhasil disimpan!');
    }

    public function edit($id)
    {
        $mahasiswa = Mahasiswa::findOrFail($id);
        $jurusans = Jurusan::orderBy('nama')->get();
        return view('mahasiswa.edit', compact('mahasiswa', 'jurusans'));
    }

    public function update(Request $request, $id)
    {
        $mahasiswa = Mahasiswa::findOrFail($id);
        $this->validate($request, [
            'nama' => 'required|string|max:255',
            'nim' => 'required|string|max:50|unique:mahasiswas,nim,' . $mahasiswa->id,
            'jurusan_id' => 'required|exists:jurusans,id'
        ], [
            'nim.unique' => 'NIM sudah digunakan oleh mahasiswa lain.'
        ]);

        $jurusan = Jurusan::findOrFail($request->jurusan_id);
        $mahasiswa->update([
            'nama' => $request->nama,
            'nim' => $request->nim,
            'jurusan' => $jurusan->nama,
            'jurusan_id' => $jurusan->id
        ]);

        return redirect('/mahasiswa')->with('success', 'Data mahasiswa berhasil diperbarui!');
    }

    public function destroy($id)
    {
        Mahasiswa::findOrFail($id)->delete();
        return redirect('/mahasiswa')->with('success', 'Data mahasiswa berhasil dihapus!');
    }
}