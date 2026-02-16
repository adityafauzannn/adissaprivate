<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Adissa Private - Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- FONT AWESOME (WAJIB AGAR ICON EDIT & DELETE MUNCUL) -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <style>
        * { box-sizing: border-box; font-family: 'Segoe UI', sans-serif; }
        body { margin:0; background:#f1f5f9; }

        .wrapper {
            display: flex;
            min-height: 100vh;
        }

        /* Sidebar */
        .sidebar {
            width: 260px;
            background: linear-gradient(180deg, #0f172a, #1e293b);
            color: white;
            display: flex;
            flex-direction: column;
            padding: 25px 20px;
        }

        .brand {
            font-size: 20px;
            font-weight: bold;
            margin-bottom: 30px;
            text-align: center;
            letter-spacing: 1px;
        }

        .profile {
            text-align: center;
            margin-bottom: 30px;
        }

        .profile img {
            width: 90px;
            height: 90px;
            border-radius: 50%;
            object-fit: cover;
            border: 3px solid white;
            margin-bottom: 10px;
        }

        .profile h3 {
            margin: 0;
            font-size: 16px;
        }

        .profile small {
            color: #cbd5f5;
        }

        .menu a {
            display: flex;
            align-items: center;
            gap: 10px;
            text-decoration: none;
            color: white;
            padding: 14px 15px;
            border-radius: 12px;
            margin: 6px 0;
            background: rgba(255,255,255,0.08);
            transition: all .2s ease;
            font-size: 15px;
        }

        .menu a:hover {
            background: rgba(255,255,255,0.2);
            transform: translateX(5px);
        }

        .menu a.active {
            background: #3b82f6;
            box-shadow: 0 8px 20px rgba(59,130,246,.4);
        }

        /* Main */
        .main {
            flex: 1;
            padding: 25px 30px;
        }

        .topbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background: white;
            padding: 16px 22px;
            border-radius: 16px;
            box-shadow: 0 4px 25px rgba(0,0,0,0.05);
            margin-bottom: 25px;
        }

        .topbar h2 {
            margin: 0;
            color: #1e293b;
        }

        .cards {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(230px,1fr));
            gap: 20px;
        }

        .card {
            background: white;
            padding: 22px;
            border-radius: 18px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.05);
        }

        .card h4 {
            margin: 0 0 10px;
            font-size: 15px;
            color: #475569;
        }

        .card h1 {
            margin: 0;
            font-size: 32px;
            color: #1e293b;
        }

        .logout-btn {
            margin-top: auto;
        }

        .logout-btn button {
            width: 100%;
            padding: 14px;
            background: #ef4444;
            color: white;
            border: none;
            border-radius: 12px;
            font-size: 15px;
            cursor: pointer;
            transition: .2s ease;
        }

        .logout-btn button:hover {
            background: #dc2626;
        }
    </style>
</head>
<body>

<div class="wrapper">

    <!-- SIDEBAR -->
    <aside class="sidebar">

        <div class="brand">Adissa Private</div>

        <div class="profile">
            <img src="{{ auth()->user()->role === 'admin' 
                          ? asset('images/admin.png') 
                          : asset('images/guru.png') }}" />

            <h3>{{ auth()->user()->name }}</h3>
            <small>{{ ucfirst(auth()->user()->role) }}</small>
        </div>

        <div class="menu">
            <a href="{{ route('dashboard') }}" class="{{ request()->routeIs('dashboard') ? 'active' : '' }}">
                📊 Dashboard
            </a>

            <a href="{{ route('siswa.index') }}" class="{{ request()->routeIs('siswa.*') ? 'active' : '' }}">
                👨‍🎓 Data Siswa
            </a>

            <a href="{{ route('mapel.index') }}" class="{{ request()->routeIs('mapel.*') ? 'active' : '' }}">
                📚 Data Mapel
            </a>

            <a href="{{ route('nilai.index') }}" class="{{ request()->routeIs('nilai.*') ? 'active' : '' }}">
                📝 Data Nilai
            </a>
        </div>

        <div class="logout-btn">
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit">🚪 Logout</button>
            </form>
        </div>

    </aside>

    <!-- MAIN -->
    <main class="main">

      


        @yield('content')

    </main>

</div>

</body>
</html>
