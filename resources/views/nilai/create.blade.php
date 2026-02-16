@extends('layouts.app')

@section('content')

<style>
.container{
    max-width:800px;
    margin:auto;
}

.page-title{
    font-size:28px;
    font-weight:800;
    margin-bottom:25px;
    color:#1e293b;
    display:flex;
    align-items:center;
    gap:10px;
}

.card-form{
    border:none;
    border-radius:20px;
    box-shadow:0 15px 40px rgba(0,0,0,.08);
    overflow:hidden;
    animation:fadeUp .4s ease;
}

@keyframes fadeUp{
    from{opacity:0; transform:translateY(15px);}
    to{opacity:1; transform:translateY(0);}
}

.card-header-custom{
    background:linear-gradient(135deg,#3b82f6,#2563eb);
    color:white;
    padding:20px 25px;
}

.card-header-custom h5{
    margin:0;
    font-weight:700;
}

.card-body{
    padding:25px 30px;
}

label{
    font-weight:600;
    color:#334155;
}

select,input,textarea{
    border-radius:12px !important;
    padding:10px 14px !important;
    font-size:15px;
    border:1px solid #cbd5e1;
    width:100%;
}

.mapel-grid{
    display:grid;
    grid-template-columns:1fr 1fr;
    gap:15px;
    margin-bottom:20px;
}

.mapel-box{
    background:#f8fafc;
    padding:15px;
    border-radius:12px;
    border:1px solid #e5e7eb;
    transition:.25s;
}

.mapel-box:hover{
    border-color:#3b82f6;
    box-shadow:0 6px 20px rgba(59,130,246,.15);
}

.evaluasi-box{
    background:#f0f9ff;
    padding:15px;
    border-radius:12px;
    border:1px solid #e5e7eb;
    margin-bottom:20px;
}

.btn-save{
    background:linear-gradient(135deg,#22c55e,#16a34a);
    border:none;
    padding:12px;
    font-weight:700;
    font-size:16px;
    border-radius:12px;
    width:100%;
    color:white;
    box-shadow:0 10px 25px rgba(34,197,94,.4);
    transition:.25s;
}

.btn-save:hover{
    transform:translateY(-2px);
    box-shadow:0 12px 30px rgba(34,197,94,.5);
}

.note{
    font-size:13px;
    color:#64748b;
    margin-top:12px;
    text-align:center;
}
</style>

<div class="container mt-4">

    <h1 class="page-title">
        📝 Tambah Nilai Siswa
    </h1>

    <div class="card card-form">

        <div class="card-header-custom">
            <h5>Form Input Nilai Siswa</h5>
            <small>Adissa Private – Evaluasi Pembelajaran</small>
        </div>

        <div class="card-body">

            <form action="{{ route('nilai.store') }}" method="POST">
                @csrf

                <!-- PILIH SISWA -->
                <div class="mb-4">
                    <label class="mb-2">Pilih Siswa</label>
                    <select name="siswa_id" required>
                        <option value="">-- Pilih Siswa --</option>
                        @foreach($siswa as $s)
                            <option value="{{ $s->id }}">
                                {{ $s->nama }} ({{ $s->kelas }})
                            </option>
                        @endforeach
                    </select>
                </div>

                <hr class="mb-4">

                <h5 class="fw-bold mb-3">📚 Nilai Mata Pelajaran</h5>

                <div class="mapel-grid">
                    @foreach($mapel as $m)
                        <div class="mapel-box">
                            <label>{{ $m->nama_mapel }}</label>
                            <input type="number" name="nilai[{{ $m->id }}]" placeholder="0–100">
                        </div>
                    @endforeach
                </div>

                <!-- EVALUASI GURU -->
                <div class="evaluasi-box">
                    <label>📝 Evaluasi Guru</label>
                    <textarea name="evaluasi" rows="5" placeholder="Catatan guru: bacaan, ngaji, perilaku, dsb"></textarea>
                </div>

                <button class="btn-save">
                    💾 Simpan Nilai & Evaluasi
                </button>

                <div class="note">
                    Nilai dan evaluasi dapat diperbarui kembali jika diperlukan
                </div>

            </form>

        </div>
    </div>

</div>

@endsection
