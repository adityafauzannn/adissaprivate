<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Laporan Akademik Siswa</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@600;700&family=Inter:wght@400;500;600&display=swap" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<style>
body {
    font-family: 'Inter', sans-serif;
    background: linear-gradient(160deg,#0b1c2d,#02070c);
}
.glass {
    background: #fff;
    border-radius: 22px;
    box-shadow: 0 25px 70px rgba(0,0,0,.35);
}
.title {
    font-family: 'Playfair Display', serif;
}
.gold {
    color: #d4af37;
}
.badge-lux {
    background: linear-gradient(135deg,#0b1c2d,#1e3a5f);
}
</style>
</head>

<body>
<div class="container py-5" style="max-width:1200px">

<!-- HEADER -->
<div class="text-center text-white mb-5">
    <i class="bi bi-mortarboard-fill fs-1 gold"></i>
    <h1 class="title fw-bold mt-3">Laporan Perkembangan Akademik</h1>
    <p class="opacity-75">Sistem Informasi Jasa Les Privat</p>
</div>

<!-- FORM -->
<div class="glass p-4 mb-5">
<form action="{{ route('orangtua.cari') }}" method="GET">
<div class="row g-3">
    <div class="col-md-5">
        <label class="form-label small">Nama Siswa</label>
        <input type="text" name="nama" class="form-control form-control-lg" required>
    </div>
    <div class="col-md-5">
        <label class="form-label small">Kelas</label>
        <input type="text" name="kelas" class="form-control form-control-lg" required>
    </div>
    <div class="col-md-2 d-grid">
        <button class="btn btn-warning btn-lg fw-semibold">
            <i class="bi bi-search"></i> Tampilkan
        </button>
    </div>
</div>
</form>
</div>

@if($siswa)

@php
    $rata = round(
        $siswa->pertemuans
            ->flatMap(fn($p)=>$p->nilais)
            ->avg('nilai'),1
    );

    if($rata >= 90) $predikat = 'Sangat Baik';
    elseif($rata >= 80) $predikat = 'Baik';
    elseif($rata >= 70) $predikat = 'Cukup';
    else $predikat = 'Perlu Pendampingan';
@endphp

<!-- PROFIL -->
<div class="glass p-4 mb-5">
    <h2 class="title gold">{{ $siswa->nama }}</h2>
    <span class="badge badge-lux px-4 py-2">Kelas {{ $siswa->kelas }}</span>

    <div class="row text-center mt-4">
        <div class="col-md-4">
            <h6>Rata-rata Nilai</h6>
            <h2 class="fw-bold">{{ $rata }}</h2>
        </div>
        <div class="col-md-4">
            <h6>Predikat</h6>
            <h5 class="fw-bold text-success">{{ $predikat }}</h5>
        </div>
        <div class="col-md-4">
            <h6>Total Pertemuan</h6>
            <h5 class="fw-bold">{{ $siswa->pertemuans->count() }}</h5>
        </div>
    </div>
</div>

<!-- SAW -->
@if(isset($hasilSaw))
<div class="glass p-4 mb-5 border border-warning">
    <h4 class="title gold mb-3">
        <i class="bi bi-calculator-fill"></i> Hasil Penilaian (Mingguan)
    </h4>

    <div class="row text-center">
        <div class="col-md-4">
            <h6>Nilai Akhir</h6>
            <h2 class="fw-bold text-warning">{{ $hasilSaw['nilai_akhir'] }}</h2>
        </div>
        <div class="col-md-4">
            <h6>Predikat</h6>
            <h5 class="fw-bold text-success">{{ $hasilSaw['predikat'] }}</h5>
        </div>
        <div class="col-md-4">
            <h6>Jumlah Mapel Dinilai</h6>
            <h5 class="fw-bold">{{ count($hasilSaw['detail']) }}</h5>
        </div>
    </div>

    <hr>

    <table class="table table-sm table-bordered mt-3">
        <thead class="table-light">
            <tr>
                <th>Mata Pelajaran</th>
                <th>Rata-rata</th>
                <th>Bobot</th>
            </tr>
        </thead>
        <tbody>
            @foreach($hasilSaw['detail'] as $d)
            <tr>
                <td>{{ $d['mapel'] }}</td>
                <td class="text-center">{{ $d['rata_rata'] }}</td>
                <td class="text-center">{{ $d['bobot'] }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endif

<!-- GRAFIK -->
@php
$labels=[];$scores=[];
foreach($siswa->pertemuans as $p){
    $labels[]='Pertemuan '.$p->pertemuan_ke;
    $scores[]=round($p->nilais->avg('nilai'),1);
}
@endphp

<div class="glass p-4 mb-5">
<canvas id="chart"></canvas>
</div>

<script>
new Chart(document.getElementById('chart'),{
type:'line',
data:{
labels:@json($labels),
datasets:[{
data:@json($scores),
borderWidth:3,
tension:.4
}]
},
options:{plugins:{legend:{display:false}},scales:{y:{min:0,max:100}}}
});
</script>

<!-- DETAIL -->
@foreach($siswa->pertemuans as $p)
<div class="glass mb-5">
<div class="p-4 d-flex justify-content-between">
    <strong>Pertemuan ke-{{ $p->pertemuan_ke }}</strong>
    <span class="text-muted">{{ \Carbon\Carbon::parse($p->tanggal)->format('d F Y') }}</span>
</div>

<div class="px-4 pb-4">
<table class="table table-bordered">
<thead><tr><th>Mapel</th><th width="120">Nilai</th></tr></thead>
<tbody>
@foreach($p->nilais as $n)
<tr>
<td>{{ $n->mapel->nama_mapel }}</td>
<td class="text-center fw-bold">{{ $n->nilai }}</td>
</tr>
@endforeach
</tbody>
</table>

<div class="bg-light p-3 rounded">
<strong>Evaluasi Guru</strong>
<p class="mb-0 fst-italic">{{ $p->evaluasi->catatan_guru ?? 'Belum ada evaluasi.' }}</p>
</div>
</div>
</div>
@endforeach

@endif

<div class="text-center text-white-50 small mt-5">
© {{ date('Y') }} Sistem Informasi Les Privat • Dokumen Resmi
</div>

</div>
</body>
</html>
