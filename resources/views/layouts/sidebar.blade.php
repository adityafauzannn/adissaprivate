<div class="w-64 bg-gray-800 text-white min-h-screen fixed">
    <div class="p-4 flex flex-col items-center gap-2 border-b border-gray-700">
        <img src="{{ asset('images/profile.png') }}"
             class="w-16 h-16 rounded-full border">
             
        <h3 class="text-sm font-semibold">
            {{ auth()->user()->name }}
        </h3>

        <span class="text-xs text-gray-400">Guru / Admin</span>
    </div>

    <nav class="mt-4 flex flex-col gap-1">
        <a href="{{ route('dashboard') }}" class="px-4 py-2 hover:bg-gray-700">Dashboard</a>
        <a href="{{ route('siswa.index') }}" class="px-4 py-2 hover:bg-gray-700">Data Siswa</a>
        <a href="{{ route('mapel.index') }}" class="px-4 py-2 hover:bg-gray-700">Data Mapel</a>
        <a href="{{ route('nilai.index') }}" class="px-4 py-2 hover:bg-gray-700">Data Nilai</a>
    </nav>
</div>
