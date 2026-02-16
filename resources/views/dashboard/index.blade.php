@extends('layouts.app')

@section('content')

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<style>
.card-box {
    background: white;
    padding: 20px;
    border-radius: 18px;
    box-shadow: 0 10px 25px rgba(0,0,0,.05);
}
.summary {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(220px,1fr));
    gap: 20px;
    margin-bottom: 30px;
}
.summary-item h3 {
    font-size: 28px;
    margin: 0;
}
.summary-item p {
    margin: 0;
    color: #64748b;
}
</style>

<h2>📊 Dashboard Sistem Les Privat</h2>
<p>{{ now()->format('d F Y') }}</p>

{{-- SUMMARY --}}
<div class="summary">
    <div class="card-box summary-item">
        <p>Total Siswa</p>
        <h3>{{ $totalSiswa }}</h3>
    </div>
    <div class="card-box summary-item">
        <p>Total Mapel</p>
        <h3>{{ $totalMapel }}</h3>
    </div>
    <div class="card-box summary-item">
        <p>Total Data Nilai</p>
        <h3>{{ $totalNilai }}</h3>
    </div>
</div>

{{-- GRAFIK --}}
<div class="summary">

    {{-- BAR CHART --}}
    <div class="card-box">
        <h4>📊 Rata-Rata Nilai per Mata Pelajaran</h4>
        <canvas id="barChart"></canvas>
    </div>

    {{-- LINE CHART --}}
    <div class="card-box">
        <h4>📈 Perkembangan Nilai Siswa</h4>
        <p id="namaSiswa" style="font-weight:600; margin-bottom:10px"></p>
        <canvas id="lineChart"></canvas>
    </div>

</div>

<script>
/* ================= BAR CHART ================= */
new Chart(document.getElementById('barChart'), {
    type: 'bar',
    data: {
        labels: {!! json_encode($rataMapel->pluck('nama_mapel')) !!},
        datasets: [{
            label: 'Rata-rata Nilai',
            data: {!! json_encode($rataMapel->pluck('rata_rata')) !!},
        }]
    },
    options: {
        responsive: true,
        plugins: {
            legend: { display: false }
        },
        scales: {
            y: { beginAtZero: true, max: 100 }
        }
    }
});

/* ================= LINE CHART BERGANTIAN ================= */
const siswaData = @json($siswa);
let indexSiswa = 0;
let lineChart = null;

function renderLineChart() {
    if (siswaData.length === 0) return;

    const siswa = siswaData[indexSiswa];
    const labels = siswa.nilai.map(n => n.mapel.nama_mapel);
    const dataNilai = siswa.nilai.map(n => n.nilai);

    document.getElementById('namaSiswa').innerText =
        '👤 ' + siswa.nama;

    if (lineChart) lineChart.destroy();

    const ctx = document.getElementById('lineChart').getContext('2d');
    lineChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: labels,
            datasets: [{
                label: 'Nilai',
                data: dataNilai,
                tension: 0.4,
                fill: true,
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: { display: false }
            },
            scales: {
                y: { beginAtZero: true, max: 100 }
            }
        }
    });

    indexSiswa++;
    if (indexSiswa >= siswaData.length) indexSiswa = 0;
}

// tampil pertama
renderLineChart();

// ganti siswa tiap 5 detik
setInterval(renderLineChart, 5000);
</script>

@endsection
