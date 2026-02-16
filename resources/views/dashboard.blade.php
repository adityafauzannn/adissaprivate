@extends('layouts.app')

@section('content')
<div class="cards">

    {{-- Total Siswa --}}
    <div class="card">
        <h4>Total Siswa</h4>
        <h1>{{ $totalSiswa }}</h1>
    </div>

    {{-- Total Mapel --}}
    <div class="card">
        <h4>Total Mapel</h4>
        <h1>{{ $totalMapel }}</h1>
    </div>

</div>

{{-- Grafik --}}
<div class="card mt-4">
    <h4 class="mb-3">Jumlah Siswa per Mapel</h4>
    <canvas id="siswaMapelChart" height="100"></canvas>
</div>
@endsection

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const ctx = document.getElementById('siswaMapelChart').getContext('2d');
    const siswaMapelChart = new Chart(ctx, {
        type: 'bar', // bisa diganti 'line', 'doughnut', 'pie' sesuai selera
        data: {
            labels: {!! json_encode($mapelLabels) !!},
            datasets: [{
                label: 'Jumlah Siswa',
                data: {!! json_encode($mapelCounts) !!},
                backgroundColor: 'rgba(59, 130, 246, 0.7)',
                borderColor: 'rgba(59, 130, 246, 1)',
                borderWidth: 1,
                borderRadius: 5,
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: { display: false },
                tooltip: { mode: 'index', intersect: false },
            },
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: { stepSize: 1 }
                }
            }
        }
    });
</script>
@endsection
