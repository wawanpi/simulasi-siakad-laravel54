<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Dosen;
use App\Jurusan;

class DosenController extends Controller
{
    public function index()
    {
        $dosens = Dosen::with('jurusan')->orderBy('nama')->paginate(10);
        return view('dosen.index', compact('dosens'));
    }

    public function create()
    {
        $jurusans = Jurusan::orderBy('nama')->get();
        return view('dosen.create', compact('jurusans'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'nidn' => 'required|string|max:50|unique:dosens,nidn',
            'nama' => 'required|string|max:255',
            'email' => 'nullable|email|max:255|unique:dosens,email',
            'jurusan_id' => 'required|exists:jurusans,id'
        ], [
            'nidn.unique' => 'NIDN sudah digunakan oleh dosen lain.',
            'email.unique' => 'Email sudah digunakan oleh dosen lain.'
        ]);
        Dosen::create($request->only(['nidn', 'nama', 'email', 'jurusan_id']));
        return redirect('/dosen')->with('success', 'Data dosen berhasil disimpan!');
    }

    public function edit($id)
    {
        $dosen = Dosen::findOrFail($id);
        $jurusans = Jurusan::orderBy('nama')->get();
        return view('dosen.edit', compact('dosen', 'jurusans'));
    }

    public function update(Request $request, $id)
    {
        $dosen = Dosen::findOrFail($id);
        $this->validate($request, [
            'nidn' => 'required|string|max:50|unique:dosens,nidn,' . $dosen->id,
            'nama' => 'required|string|max:255',
            'email' => 'nullable|email|max:255|unique:dosens,email,' . $dosen->id,
            'jurusan_id' => 'required|exists:jurusans,id'
        ], [
            'nidn.unique' => 'NIDN sudah digunakan oleh dosen lain.',
            'email.unique' => 'Email sudah digunakan oleh dosen lain.'
        ]);
        $dosen->update($request->only(['nidn', 'nama', 'email', 'jurusan_id']));
        return redirect('/dosen')->with('success', 'Data dosen berhasil diperbarui!');
    }

    public function destroy($id)
    {
        Dosen::findOrFail($id)->delete();
        return redirect('/dosen')->with('success', 'Data dosen berhasil dihapus!');
    }
}
