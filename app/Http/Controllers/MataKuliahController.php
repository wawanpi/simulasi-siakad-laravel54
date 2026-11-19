<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\MataKuliah;
use App\Jurusan;

class MataKuliahController extends Controller
{
    public function index()
    {
        $mataKuliah = MataKuliah::with('jurusan')->orderBy('nama')->paginate(10);
        return view('mata-kuliah.index', compact('mataKuliah'));
    }

    public function create()
    {
        $jurusans = Jurusan::orderBy('nama')->get();
        return view('mata-kuliah.create', compact('jurusans'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'kode' => 'required|string|max:20|unique:mata_kuliahs,kode',
            'nama' => 'required|string|max:255',
            'sks' => 'required|integer|min:1|max:10',
            'semester' => 'required|integer|min:1|max:14',
            'jurusan_id' => 'required|exists:jurusans,id'
        ], ['kode.unique' => 'Kode mata kuliah sudah digunakan.']);
        MataKuliah::create($request->only(['kode', 'nama', 'sks', 'semester', 'jurusan_id']));
        return redirect('/mata-kuliah')->with('success', 'Data mata kuliah berhasil disimpan!');
    }

    public function edit($id)
    {
        $mataKuliah = MataKuliah::findOrFail($id);
        $jurusans = Jurusan::orderBy('nama')->get();
        return view('mata-kuliah.edit', compact('mataKuliah', 'jurusans'));
    }

    public function update(Request $request, $id)
    {
        $mataKuliah = MataKuliah::findOrFail($id);
        $this->validate($request, [
            'kode' => 'required|string|max:20|unique:mata_kuliahs,kode,' . $mataKuliah->id,
            'nama' => 'required|string|max:255',
            'sks' => 'required|integer|min:1|max:10',
            'semester' => 'required|integer|min:1|max:14',
            'jurusan_id' => 'required|exists:jurusans,id'
        ], ['kode.unique' => 'Kode mata kuliah sudah digunakan.']);
        $mataKuliah->update($request->only(['kode', 'nama', 'sks', 'semester', 'jurusan_id']));
        return redirect('/mata-kuliah')->with('success', 'Data mata kuliah berhasil diperbarui!');
    }

    public function destroy($id)
    {
        MataKuliah::findOrFail($id)->delete();
        return redirect('/mata-kuliah')->with('success', 'Data mata kuliah berhasil dihapus!');
    }
}
