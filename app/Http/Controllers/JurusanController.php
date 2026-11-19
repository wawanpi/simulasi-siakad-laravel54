<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Jurusan;

class JurusanController extends Controller
{
    public function index()
    {
        $jurusans = Jurusan::orderBy('nama')->paginate(10);
        return view('jurusan.index', compact('jurusans'));
    }

    public function create()
    {
        return view('jurusan.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'kode' => 'required|string|max:20|unique:jurusans,kode',
            'nama' => 'required|string|max:255|unique:jurusans,nama',
            'keterangan' => 'nullable|string'
        ], [
            'kode.unique' => 'Kode jurusan sudah digunakan.',
            'nama.unique' => 'Nama jurusan sudah terdaftar.'
        ]);
        Jurusan::create($request->only(['kode', 'nama', 'keterangan']));
        return redirect('/jurusan')->with('success', 'Data jurusan berhasil disimpan!');
    }

    public function edit($id)
    {
        $jurusan = Jurusan::findOrFail($id);
        return view('jurusan.edit', compact('jurusan'));
    }

    public function update(Request $request, $id)
    {
        $jurusan = Jurusan::findOrFail($id);
        $this->validate($request, [
            'kode' => 'required|string|max:20|unique:jurusans,kode,' . $jurusan->id,
            'nama' => 'required|string|max:255|unique:jurusans,nama,' . $jurusan->id,
            'keterangan' => 'nullable|string'
        ], [
            'kode.unique' => 'Kode jurusan sudah digunakan.',
            'nama.unique' => 'Nama jurusan sudah terdaftar.'
        ]);
        $jurusan->update($request->only(['kode', 'nama', 'keterangan']));
        return redirect('/jurusan')->with('success', 'Data jurusan berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $jurusan = Jurusan::findOrFail($id);
        if ($jurusan->dosens()->exists() || $jurusan->mataKuliah()->exists() || $jurusan->mahasiswas()->exists()) {
            return redirect('/jurusan')->with('error', 'Jurusan tidak dapat dihapus karena masih digunakan oleh data akademik.');
        }

        $jurusan->delete();
        return redirect('/jurusan')->with('success', 'Data jurusan berhasil dihapus!');
    }
}
