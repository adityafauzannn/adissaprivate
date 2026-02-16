@extends('layouts.app')

@section('content')

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<style>
.siswa-card{
    background:#fff;
    padding:24px;
    border-radius:20px;
    box-shadow:0 10px 30px rgba(0,0,0,.06);
}

.table-siswa{
    width:100%;
    border-collapse:collapse;
    margin-top:16px;
}

.table-siswa th{
    background:#3b82f6;
    color:#fff;
    padding:12px;
    text-align:left;
}

.table-siswa td{
    padding:12px;
    border-bottom:1px solid #e5e7eb;
}

.table-siswa tr:hover{
    background:#f8fafc;
    cursor:pointer;
}

.btn-tambah{
    background:#2563eb;
    color:#fff;
    padding:10px 16px;
    border-radius:12px;
    text-decoration:none;
    font-weight:600;
}

/* MODAL POPUP KEREN */
.modal-bg{
    position:fixed;
    inset:0;
    background:rgba(0,0,0,0.75);
    display:none;
    justify-content:center;
    align-items:center;
    z-index:999;
}

.modal-box{
    background: linear-gradient(135deg, #e0f2fe, #dbeafe);
    width:650px;
    max-width:95%;
    border-radius:25px;
    padding:30px;
    box-shadow:0 20px 50px rgba(0,0,0,0.45);
    animation:fadeScale 0.35s ease;
    position:relative;
    overflow:hidden;
    border:2px solid #3b82f6;
}

@keyframes fadeScale{
    from{opacity:0; transform:scale(0.9);}
    to{opacity:1; transform:scale(1);}
}

.modal-header{
    display:flex;
    justify-content:center; /* Nama siswa di tengah */
    align-items:center;
    border-bottom:2px solid rgba(255,255,255,0.3);
    padding-bottom:10px;
    margin-bottom:20px;
    position: relative;
}

.modal-header h4{
    font-size:26px;
    font-weight:800;
    color:#1e3a8a;
    text-shadow: 2px 2px 4px rgba(0,0,0,0.3);
}

.modal-header button{
    position:absolute;
    right:0;
    top:0;
    background:#ef4444;
    color:#fff;
    border:none;
    border-radius:12px;
    padding:6px 10px;
    font-weight:700;
    cursor:pointer;
    transition:0.2s;
}
.modal-header button:hover{
    background:#dc2626;
}

.modal-body{
    display:flex;
    gap:30px;
    align-items:flex-start;
    flex-wrap:wrap;
    justify-content:center;
}

.modal-body img{
    width:150px;
    height:150px;
    border-radius:50%;
    object-fit:cover;
    border:5px solid #3b82f6;
    box-shadow:0 10px 30px rgba(0,0,0,0.3), 0 0 15px rgba(59,130,246,0.5);
    transition: transform 0.3s;
}
.modal-body img:hover{
    transform: scale(1.08);
}

.modal-info{
    flex:1;
    display:flex;
    flex-direction:column;
    gap:12px;
}

.modal-info p{
    margin:0;
    font-size:15px;
    background:#f0f9ff;
    padding:12px 16px;
    border-radius:14px;
    box-shadow: inset 0 2px 5px rgba(0,0,0,0.1);
    font-weight:500;
}

.modal-footer{
    margin-top:25px;
    text-align:center;
    display:flex;
    gap:15px;
    justify-content:center;
}

.btn{
    padding:12px 20px;
    border-radius:16px;
    font-weight:600;
    text-decoration:none;
    transition:0.3s;
}

.btn-edit{
    background:#facc15;
    color:#1f2937;
}
.btn-edit:hover{
    background:#eab308;
    transform:scale(1.05);
}

.btn-delete{
    background:#ef4444;
    color:#fff;
    border:none;
}
.btn-delete:hover{
    background:#dc2626;
    transform:scale(1.05);
}
</style>

<div class="siswa-card">

    <div style="display:flex;justify-content:space-between;align-items:center;">
        <h3>📚 Data Siswa</h3>
        <a href="{{ route('siswa.create') }}" class="btn-tambah">+ Tambah Siswa</a>
    </div>

    <table class="table-siswa">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Siswa</th>
                <th>Kelas</th>
            </tr>
        </thead>
        <tbody>
        @foreach($siswas as $s)
            @php
                $siswa_json = json_encode([
                    'id' => $s->id,
                    'nama' => $s->nama,
                    'kelas' => $s->kelas,
                    'alamat' => $s->alamat,
                    'nama_orangtua' => $s->nama_orangtua,
                    'kontak_orangtua' => $s->kontak_orangtua,
                    'edit_url' => route('siswa.edit', $s->id),
                    'delete_url' => route('siswa.destroy', $s->id),
                ]);
            @endphp
            <tr onclick='openModal({!! $siswa_json !!})'>
                <td>{{ $loop->iteration }}</td>
                <td><strong>{{ $s->nama }}</strong></td>
                <td>{{ $s->kelas }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>

</div>

{{-- MODAL --}}
<div class="modal-bg" id="modal">
    <div class="modal-box">
        <div class="modal-header">
            <h4 id="m-nama"></h4>
            <button onclick="closeModal()">✖</button>
        </div>

        <div class="modal-body">
            <img id="m-foto" src="" alt="foto">

            <div class="modal-info">
                <p><b>Kelas:</b> <span id="m-kelas"></span></p>
                <p><b>Alamat:</b> <span id="m-alamat"></span></p>
                <p><b>Orang Tua:</b> <span id="m-ortu"></span></p>
                <p><b>Kontak:</b> <span id="m-kontak"></span></p>
            </div>
        </div>

        <div class="modal-footer">
            <a id="btn-edit" class="btn btn-edit">✏️ Edit</a>

            <form id="form-delete" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="button" class="btn btn-delete" onclick="hapus()">🗑️ Hapus</button>
            </form>
        </div>
    </div>
</div>

<script>
let currentId = null;

function openModal(siswa){
    currentId = siswa.id;

    document.getElementById('modal').style.display='flex';

    document.getElementById('m-nama').innerText = siswa.nama;
    document.getElementById('m-kelas').innerText = siswa.kelas;
    document.getElementById('m-alamat').innerText = siswa.alamat ?? '-';
    document.getElementById('m-ortu').innerText = siswa.nama_orangtua ?? '-';
    document.getElementById('m-kontak').innerText = siswa.kontak_orangtua ?? '-';
    
 

    // Edit & Hapus URL
    document.getElementById('btn-edit').href = siswa.edit_url;
    document.getElementById('form-delete').action = siswa.delete_url;
}

function closeModal(){
    document.getElementById('modal').style.display='none';
}

function hapus(){
    Swal.fire({
        title:'Yakin hapus?',
        text:'Data siswa akan dihapus permanen',
        icon:'warning',
        showCancelButton:true,
        confirmButtonText:'Hapus',
        cancelButtonText:'Batal'
    }).then(res=>{
        if(res.isConfirmed){
            document.getElementById('form-delete').submit();
        }
    })
}
</script>

@endsection
