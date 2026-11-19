@extends('layouts.app')
@section('title', 'Data Mahasiswa - SIAKAD')
@section('content')
<div class="container">
    <h2>Data Mahasiswa</h2>
    @if (session('success')) <div class="alert">{{ session('success') }}</div> @endif
    <p>
        <a href="{{ url('/mahasiswa/create') }}" class="btn">Tambah Mahasiswa</a>
        <a href="{{ url('/home') }}" class="btn" style="background:#6b7280;">Kembali ke Dashboard</a>
    </p>
    <div class="panel"><div class="panel-body" style="overflow-x:auto;">
        <table width="100%" cellpadding="10" cellspacing="0" border="1" style="border-collapse:collapse;">
            <tr><th>NIM</th><th>Nama</th><th>Jurusan</th><th>Aksi</th></tr>
            @foreach ($mahasiswas as $mahasiswa)
            <tr>
                <td>{{ $mahasiswa->nim }}</td><td>{{ $mahasiswa->nama }}</td>
                <td>{{ $mahasiswa->jurusanData ? $mahasiswa->jurusanData->nama : $mahasiswa->jurusan }}</td>
                <td>
                    <a class="btn" href="{{ url('/mahasiswa/'.$mahasiswa->id.'/edit') }}">Edit</a>
                    <form action="{{ url('/mahasiswa/'.$mahasiswa->id) }}" method="POST" style="display:inline;">
                        {{ csrf_field() }} {{ method_field('DELETE') }}
                        <button class="btn" style="background:#e74c3c;" onclick="return confirm('Hapus data ini?')">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </table>
        {{ $mahasiswas->links() }}
    </div></div>
</div>
@endsection
