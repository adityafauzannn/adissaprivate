@extends('layouts.app')

@section('content')

<style>
    .page-title{
        font-size:28px;
        font-weight:800;
        margin-bottom:25px;
        color:#1e293b;
        display:flex;
        align-items:center;
        gap:10px;
    }

    .form-card {
        background: linear-gradient(180deg, #ffffff, #f8fafc);
        padding: 35px;
        border-radius: 26px;
        box-shadow: 0 20px 45px rgba(0,0,0,0.08);
        max-width: 620px;
        animation: fadeUp .45s ease;
        position:relative;
        overflow:hidden;
    }

    .form-card::before{
        content:'';
        position:absolute;
        top:-80px;
        right:-80px;
        width:180px;
        height:180px;
        background:rgba(59,130,246,0.15);
        border-radius:50%;
    }

    @keyframes fadeUp {
        from {opacity:0; transform: translateY(20px);}
        to {opacity:1; transform: translateY(0);}
    }

    .form-group {
        margin-bottom: 20px;
    }

    label {
        font-weight: 700;
        color: #334155;
        margin-bottom: 8px;
        display: block;
        font-size:14px;
    }

    input {
        width: 100%;
        padding: 14px 16px;
        border-radius: 14px;
        border: 1px solid #cbd5e1;
        font-size: 15px;
        transition: .25s;
        background:white;
    }

    input:focus{
        outline:none;
        border-color:#3b82f6;
        box-shadow:0 0 0 4px rgba(59,130,246,.15);
    }

    input[readonly] {
        background: #f1f5f9;
        color:#475569;
        cursor: not-allowed;
    }

    .info-box{
        background:#eff6ff;
        padding:14px 18px;
        border-radius:14px;
        font-size:14px;
        color:#1e3a8a;
        margin-bottom:22px;
        display:flex;
        gap:10px;
        align-items:center;
    }

    .btn-update {
        background: linear-gradient(135deg, #3b82f6, #2563eb);
        color: white;
        padding: 14px;
        border-radius: 16px;
        border: none;
        cursor: pointer;
        width: 100%;
        font-weight: 700;
        font-size: 16px;
        margin-top:10px;
        box-shadow:0 15px 35px rgba(59,130,246,.45);
        transition:.25s;
    }

    .btn-update:hover {
        transform: translateY(-2px);
        box-shadow:0 18px 40px rgba(59,130,246,.6);
    }

    .note {
        font-size: 13px;
        color: #64748b;
        margin-top: 14px;
        text-align: center;
    }

    .badge{
        display:inline-block;
        background:#22c55e;
        color:white;
        font-size:12px;
        padding:6px 12px;
        border-radius:999px;
        font-weight:600;
    }
</style>

<h1 class="page-title">
    ✏️ Edit Nilai Siswa
    <span class="badge">Perbaikan Nilai</span>
</h1>

<div class="form-card">

    <div class="info-box">
        📌 Perubahan hanya berlaku pada nilai siswa, data lain bersifat informasi.
    </div>

    <form method="POST" action="{{ route('nilai.update', $nilai->id) }}">
        @csrf
        @method('PUT')

        <!-- NAMA SISWA -->
        <div class="form-group">
            <label>Nama Siswa</label>
            <input type="text" value="{{ $nilai->siswa->nama }}" readonly>
            <input type="hidden" name="siswa_id" value="{{ $nilai->siswa_id }}">
        </div>

        <!-- MAPEL -->
        <div class="form-group">
            <label>Mata Pelajaran</label>
            <input type="text" value="{{ $nilai->mapel->nama_mapel }}" readonly>
            <input type="hidden" name="mapel_id" value="{{ $nilai->mapel_id }}">
        </div>

        <!-- NILAI -->
        <div class="form-group">
            <label>Nilai Akhir</label>
            <input type="number" name="nilai" value="{{ $nilai->nilai }}" min="0" max="100" required>
        </div>

        <button class="btn-update">
            💾 Simpan Perubahan Nilai
        </button>

        <div class="note">
            Pastikan nilai yang diinput sudah sesuai dengan hasil evaluasi siswa
        </div>
        
        <!-- EVALUASI -->
        <div class="form-group">
            <label>Evaluasi Guru</label>
            <textarea 
             name="evaluasi" 
             rows="4"
            >{{ $nilai->evaluasi }}</textarea>
        </div>

    </form>
</div>

@endsection
