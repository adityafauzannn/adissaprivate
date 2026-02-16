<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Login - Adissa Private</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <style>
        body {
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            font-family: 'Segoe UI', sans-serif;
            margin:0;
            overflow:hidden;
            background: linear-gradient(270deg, #0f172a, #1e293b, #0f172a);
            background-size: 600% 600%;
            animation: gradientBG 20s ease infinite;
            position: relative;
        }

        @keyframes gradientBG {
            0%{background-position:0% 50%}
            50%{background-position:100% 50%}
            100%{background-position:0% 50%}
        }

        /* Bintang berkelip & melayang */
        .star {
            position: absolute;
            width: 4px;
            height: 4px;
            background: white;
            border-radius: 50%;
            opacity: 0.6;
            animation: twinkle 4s linear infinite alternate, moveStar linear infinite;
        }
        @keyframes twinkle { 0%{opacity:0.3} 50%{opacity:1} 100%{opacity:0.3} }
        @keyframes moveStar { 0%{transform: translateY(0)} 100%{transform: translateY(-80vh)} }

        /* Partikel cahaya */
        .particle {
            position: absolute;
            width: 6px;
            height: 6px;
            background: rgba(255,255,255,0.4);
            border-radius: 50%;
            animation: moveParticle linear infinite;
        }
        @keyframes moveParticle {
            0% { transform: translate(0,0) }
            100% { transform: translate(100px,-150px) }
        }

        /* Login card */
        .login-card {
            background: white;
            color: #1e293b;
            border-radius: 15px;
            padding: 50px 30px 30px;
            width: 100%;
            max-width: 400px;
            box-shadow: 0 15px 35px rgba(0,0,0,0.2);
            text-align: center;
            animation: fadeScale 0.8s ease forwards;
            position: relative;
            z-index: 10;
            transition: box-shadow 0.3s ease;
        }
        .login-card:hover { box-shadow: 0 0 30px rgba(59,130,246,0.6); }

        @keyframes fadeScale { 0% { opacity:0; transform: translateY(-20px) scale(0.95); } 100% { opacity:1; transform: translateY(0) scale(1); } }

        /* Logo */
        .login-logo { width: 80px; margin-bottom: 30px; transition: transform 0.3s ease; }
        .login-logo:hover { transform: scale(1.1) rotate(-5deg); }

        /* Form inputs */
        .form-control { border-radius: 10px; padding: 12px 40px 12px 15px; transition: 0.3s; }
        .form-control:focus { border-color: #3b82f6; box-shadow: 0 0 10px rgba(59,130,246,0.3); outline: none; }
        .input-icon { position: relative; }
        .input-icon i { position: absolute; right: 15px; top: 50%; transform: translateY(-50%); color: #9ca3af; transition: color 0.3s; }
        .form-control:focus + i { color: #3b82f6; }

        /* Button */
        .btn-login { background: #3b82f6; color: white; border-radius: 10px; padding: 12px; width: 100%; transition: all 0.3s; }
        .btn-login:hover { background: #2563eb; box-shadow: 0 8px 25px rgba(59,130,246,0.3); }

        /* Error & forgot password */
        .form-text { color: red; font-size: 0.85rem; }
        .forgot-pass { font-size: 0.85rem; color: #3b82f6; text-decoration: none; }
        .forgot-pass:hover { text-decoration: underline; }
    </style>
</head>
<body>

    {{-- Bintang --}}
    @for($i=0;$i<20;$i++)
        <div class="star" style="
            left: {{ rand(0, 95) }}%;
            width: {{ rand(2,5) }}px;
            height: {{ rand(2,5) }}px;
            animation-duration: {{ rand(3,6) }}s;
            animation-delay: {{ rand(0,5) }}s;
        "></div>
    @endfor

    {{-- Partikel cahaya --}}
    @for($i=0;$i<15;$i++)
        <div class="particle" style="
            left: {{ rand(0, 90) }}%;
            bottom: {{ rand(0, 50) }}px;
            width: {{ rand(4,7) }}px;
            height: {{ rand(4,7) }}px;
            animation-duration: {{ rand(6,12) }}s;
            animation-delay: {{ rand(0,5) }}s;
        "></div>
    @endfor

    <div class="login-card">
        <!-- Logo -->
        <img src="{{ asset('images/logo.png') }}" alt="Logo Adissa Private" class="login-logo">

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="mb-3 text-start input-icon">
                <label for="email" class="form-label">Email</label>
                <input type="email" name="email" id="email" class="form-control" required autofocus value="{{ old('email') }}">
                <i class="fas fa-envelope"></i>
                @error('email') <div class="form-text">{{ $message }}</div> @enderror
            </div>

            <div class="mb-3 text-start input-icon">
                <label for="password" class="form-label">Password</label>
                <input type="password" name="password" id="password" class="form-control" required>
                <i class="fas fa-lock"></i>
                @error('password') <div class="form-text">{{ $message }}</div> @enderror
            </div>

            <div class="mb-3 text-end">
                <a href="#" class="forgot-pass">Lupa Password?</a>
            </div>

            <button type="submit" class="btn btn-login">Login</button>
        </form>
    </div>

</body>
</html>
