@extends('layouts.app')

@section('content')

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<style>
.page-title { font-size:26px; font-weight:700; margin-bottom:20px; }

.table-card {
    background:#fff;
    padding:22px;
    border-radius:16px;
    box-shadow:0 10px 30px rgba(0,0,0,.06);
}

.top-bar {
    display:flex;
    justify-content:space-between;
    align-items:center;
    margin-bottom:18px;
    flex-wrap:wrap;
    gap:10px;
}

.btn-add {
    background:#22c55e;
    color:#fff;
    padding:10px 18px;
    border-radius:10px;
    font-weight:600;
    text-decoration:none;
}

table { width:100%; border-collapse:collapse; font-size:14px; }

th, td {
    padding:12px;
    border-bottom:1px solid #e5e7eb;
    text-align:center;
}

th { background:#f8fafc; font-weight:600; }

.badge {
    padding:4px 10px;
    border-radius:999px;
    font-weight:600;
}

.good { background:#dcfce7; color:#166534; }
.mid  { background:#fef9c3; color:#854d0e; }
.low  { background:#fee2e2; color:#991b1b; }

.btn-action {
    padding:6px 12px;
    border-radius:8px;
    font-size:13px;
    font-weight:600;
    border:none;
    cursor:pointer;
}

.btn-edit { background:#facc15; }
.btn-delete { background:#ef4444; color:white; }
</style>

<h1 class="page-title">📊 Data Nilai Siswa</h1>

<div class="table-card">

<table>
<thead>
<tr>
    <th>No</th>
    <th>Nama Siswa</th>
    @foreach($mapel as $m)
        <th>{{ $m->nama_mapel }}</th>
    @endforeach
    <th>Evaluasi</th>
    <th>Aksi</th>
</tr>
</thead>

<tbody>
@forelse($siswa as $s)
<tr>
    <td>{{ $loop->iteration }}</td>
    <td style="font-weight:600">{{ $s->nama }}</td>

    @foreach($mapel as $m)
        @php
            $nilai = $s->nilai->where('mapel_id', $m->id)->first();
            $n = $nilai->nilai ?? null;
        @endphp
        <td>
            @if($n === null)
                -
            @elseif($n >= 80)
                <span class="badge good">{{ $n }}</span>
            @elseif($n >= 60)
                <span class="badge mid">{{ $n }}</span>
            @else
                <span class="badge low">{{ $n }}</span>
            @endif
        </td>
    @endforeach

  {{-- Kolom Evaluasi --}}
@php
    $evaluasi = $s->evaluasi->sortByDesc('tanggal')->first();
@endphp

<td style="text-align:left; max-width:280px;">
    @if($evaluasi)
        <span title="{{ $evaluasi->catatan_guru }}">
            {{ \Illuminate\Support\Str::limit($evaluasi->catatan_guru, 60) }}
        </span>
    @else
        -
    @endif
</td>

{{-- Kolom Aksi --}}
<td>
    <a href="{{ route('nilai.create', ['siswa_id'=>$s->id]) }}"
       class="btn-action btn-edit">✏️</a>

    <form action="{{ route('nilai.destroy.siswa', $s->id) }}"
          method="POST"
          class="form-delete"
          style="display:inline">
        @csrf
        @method('DELETE')
        <button type="button" class="btn-action btn-delete">🗑️</button>
    </form>
</td>


       
</tr>
@empty
<tr>
    <td colspan="{{ 4 + $mapel->count() }}">
        <i>Data tidak ditemukan</i>
    </td>
</tr>
@endforelse
</tbody>
</table>

</div>

{{-- ALERT SUCCESS --}}
@if(session('success'))
<script>
Swal.fire({
    icon: 'success',
    title: 'Berhasil',
    text: '{{ session('success') }}',
    timer: 2000,
    showConfirmButton: false,
});
</script>
@endif

{{-- CONFIRM DELETE --}}
<script>
document.querySelectorAll('.btn-delete').forEach(btn => {
    btn.addEventListener('click', function () {
        const form = this.closest('.form-delete');

        Swal.fire({
            title: 'Yakin hapus?',
            text: 'Semua nilai siswa ini akan dihapus',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Ya, hapus',
            cancelButtonText: 'Batal',
            reverseButtons: true,
        }).then((result) => {
            if (result.isConfirmed) {
                form.submit();
            }
        });
    });
});
</script>

@endsection
