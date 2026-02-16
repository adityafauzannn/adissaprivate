@extends('layouts.app')

@section('content')

<style>
    .card-table {
        background: white;
        padding: 25px;
        border-radius: 18px;
        box-shadow: 0 8px 25px rgba(0,0,0,0.05);
    }
    .btn-primary {
        background:#3b82f6;
        color:white;
        padding:10px 16px;
        border-radius:10px;
        text-decoration:none;
        font-size:14px;
    }
    .btn-primary:hover { background:#2563eb; }

    table {
        width:100%;
        border-collapse: separate;
        border-spacing:0 10px;
    }
    thead th {
        background:#e2e8f0;
        padding:12px;
        border-radius:10px;
        text-align:left;
        font-size:14px;
    }
    tbody tr {
        background:white;
        box-shadow:0 3px 10px rgba(0,0,0,0.05);
        border-radius:12px;
    }
    tbody td {
        padding:14px;
        font-size:14px;
    }

    .action-btn {
        text-decoration:none;
        padding:6px 10px;
        border-radius:8px;
        font-size:13px;
        color:white;
    }
    .edit-btn { background:#facc15; }
    .edit-btn:hover { background:#eab308; }
    .delete-btn { background:#ef4444; }
    .delete-btn:hover { background:#dc2626; }
</style>

<h1 style="font-size:26px; margin-bottom:20px; color:#1e293b;">📚 Data Mapel</h1>

<a href="{{ route('mapel.create') }}" class="btn-primary">➕ Tambah Mapel</a>

<div class="card-table" style="margin-top:20px;">

    <table>
        <thead>
            <tr>
                <th style="width: 60px;">No</th>
                <th>Nama Mapel</th>
                <th style="width: 150px;">Aksi</th>
            </tr>
        </thead>

        <tbody>
            @forelse($mapel as $i => $m)
                <tr>
                    <td>{{ $i+1 }}</td>
                    <td>{{ $m->nama_mapel }}</td>
                    <td>
                        <a href="{{ route('mapel.edit', $m->id) }}" class="action-btn edit-btn">✏️ Edit</a>

                        <form action="{{ route('mapel.destroy', $m->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button class="action-btn delete-btn" onclick="return confirm('Hapus mapel ini?')">🗑️ Hapus</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="3" style="text-align:center; padding:15px;">Belum ada mapel</td>
                </tr>
            @endforelse
        </tbody>

    </table>

</div>

@endsection
