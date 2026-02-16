@extends('layouts.app')

@section('content')

<style>
    .form-card {
        background:white;
        padding:25px;
        border-radius:18px;
        box-shadow:0 8px 25px rgba(0,0,0,0.05);
        max-width:450px;
    }
    input {
        width:100%;
        padding:12px;
        border-radius:10px;
        border:1px solid #cbd5e1;
        margin-bottom:15px;
    }
    .btn-save {
        background:#3b82f6;
        color:white;
        padding:10px 18px;
        border-radius:10px;
        border:none;
        cursor:pointer;
    }
    .btn-save:hover { background:#2563eb; }
</style>

<h1 style="font-size:26px; margin-bottom:20px;">➕ Tambah Mapel</h1>

<div class="form-card">
    <form method="POST" action="{{ route('mapel.store') }}">
        @csrf

        <label>Nama Mapel</label>
        <input type="text" name="nama_mapel" required>

        <button class="btn-save">Simpan</button>
    </form>
</div>

@endsection
