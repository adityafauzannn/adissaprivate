@extends('layouts.app')

@section('content')

<style>
.card {
    max-width: 700px;
    margin: auto;
    background: white;
    padding: 30px;
    border-radius: 20px;
    box-shadow: 0 10px 30px rgba(0,0,0,.05);
}
.form-group { margin-bottom: 16px; }
label { font-weight:600; font-size:14px; margin-bottom:6px; display:block; }
input, textarea {
    width:100%;
    padding:12px 14px;
    border-radius:12px;
    border:1px solid #e5e7eb;
}
.btn-simpan {
    background:#3b82f6;
    color:white;
    padding:12px 18px;
    border:none;
    border-radius:12px;
    font-weight:600;
    cursor:pointer;
}
</style>

<div class="card">
    <h3 style="margin-bottom:20px;">➕ Tambah Siswa</h3>

    <form action="{{ route('siswa.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="form-group">
            <label>Nama</label>
            <input type="text" name="nama" required>
        </div>

        <div class="form-group">
            <label>Kelas</label>
            <input type="text" name="kelas" required>
        </div>

        <div class="form-group">
            <label>Alamat</label>
            <textarea name="alamat" rows="3"></textarea>
        </div>

        <div class="form-group">
            <label>Nama Orang Tua</label>
            <input type="text" name="nama_orangtua">
        </div>

        <div class="form-group">
            <label>Kontak Orang Tua</label>
            <input type="text" name="kontak_orangtua">
        </div>

        <button class="btn-simpan">💾 Simpan</button>
    </form>
</div>

@endsection
