@extends('layouts.app')

@section('content')

<style>
.edit-card {
    max-width: 700px;
    margin: auto;
    background: white;
    padding: 30px;
    border-radius: 20px;
    box-shadow: 0 10px 30px rgba(0,0,0,.05);
}
.form-group { margin-bottom:16px; }
label { font-weight:600; font-size:14px; display:block; margin-bottom:6px; }
input, textarea {
    width:100%;
    padding:12px 14px;
    border-radius:12px;
    border:1px solid #e5e7eb;
}
.btn-simpan {
    background:#3b82f6;
    color:white;
    padding:12px 20px;
    border-radius:12px;
    border:none;
    font-weight:600;
}
.foto-preview {
    width:120px;
    height:120px;
    border-radius:50%;
    object-fit:cover;
    border:3px solid #e5e7eb;
    margin-bottom:10px;
}
</style>

<div class="edit-card">

    <a href="{{ route('siswa.index') }}">← Kembali</a>
    <h3 style="margin:15px 0;">✏️ Edit Data Siswa</h3>

    <form action="{{ route('siswa.update', $siswa->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label>Nama</label>
            <input type="text" name="nama" value="{{ $siswa->nama }}" required>
        </div>

        <div class="form-group">
            <label>Kelas</label>
            <input type="text" name="kelas" value="{{ $siswa->kelas }}" required>
        </div>

        <div class="form-group">
            <label>Alamat</label>
            <textarea name="alamat">{{ $siswa->alamat }}</textarea>
        </div>

        <div class="form-group">
            <label>Nama Orang Tua</label>
            <input type="text" name="nama_orangtua" value="{{ $siswa->nama_orangtua }}">
        </div>

        <div class="form-group">
            <label>Kontak Orang Tua</label>
            <input type="text" name="kontak_orangtua" value="{{ $siswa->kontak_orangtua }}">
        </div>

        <button class="btn-simpan">💾 Simpan Perubahan</button>
    </form>
</div>

@endsection
