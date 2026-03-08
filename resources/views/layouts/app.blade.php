<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Golden Strategy')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
        :root {
            --red-primary: #DC3545;
            --red-dark: #C82333;
            --black-primary: #212529;
            --orange-accent: #FD7E14;
        }
        * {
            transition: all 0.3s ease;
        }
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }
        .navbar {
            background: linear-gradient(135deg, var(--black-primary), var(--red-dark));
            box-shadow: 0 2px 10px rgba(0,0,0,0.3);
            position: fixed;
            top: 0;
            width: 100%;
            z-index: 1000;
            animation: slideDown 0.5s ease;
        }
        @keyframes slideDown {
            from { transform: translateY(-100%); }
            to { transform: translateY(0); }
        }
        .content-wrapper {
            flex: 1;
            margin-top: 70px;
            animation: fadeIn 0.6s ease;
        }
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
        .navbar-brand {
            font-weight: bold;
            color: white !important;
            font-size: 1.3rem;
        }
        .navbar-brand:hover {
            transform: scale(1.05);
        }
        .nav-link {
            color: rgba(255,255,255,0.9) !important;
            font-weight: 500;
            position: relative;
        }
        .nav-link:hover {
            color: var(--orange-accent) !important;
            transform: translateY(-2px);
        }
        .nav-link::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 50%;
            width: 0;
            height: 2px;
            background: var(--orange-accent);
            transition: all 0.3s ease;
            transform: translateX(-50%);
        }
        .nav-link:hover::after {
            width: 80%;
        }
        .btn-login {
            background: var(--orange-accent);
            color: white;
            font-weight: 600;
            border: none;
            padding: 8px 25px;
            border-radius: 25px;
        }
        .btn-login:hover {
            background: var(--red-primary);
            transform: translateY(-2px) scale(1.05);
            box-shadow: 0 5px 15px rgba(253,126,20,0.4);
        }
        .card, .btn, .form-control, .form-select {
            transition: all 0.3s ease;
        }
        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 30px rgba(0,0,0,0.15);
        }
        .btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(0,0,0,0.2);
        }
        footer {
            background: linear-gradient(135deg, var(--black-primary), var(--red-dark));
            color: white;
            padding: 2rem 0;
            margin-top: auto;
            animation: fadeIn 0.8s ease;
        }
    </style>
    @yield('styles')
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container">
            <a class="navbar-brand" href="{{ route('home') }}">
                <i class="bi bi-tools"></i> BrieLLaSparepart
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}" href="{{ route('home') }}">Beranda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('sparepart') ? 'active' : '' }}" href="{{ route('sparepart') }}">Sparepart</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('booking') ? 'active' : '' }}" href="{{ route('booking') }}">Servis</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('profil') ? 'active' : '' }}" href="{{ route('profil') }}">Tentang Kami</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('kontak') ? 'active' : '' }}" href="{{ route('kontak') }}">Kontak</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('article') ? 'active' : '' }}" href="{{ route('article') }}">Artikel</a>
                    </li>
                    <li class="nav-item ms-3">
                        <a href="{{ route('login') }}" class="btn btn-login">
                            <i class="bi bi-box-arrow-in-right"></i> Login Admin
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Content -->
    <div class="content-wrapper">
        @yield('content')
    </div>

    <!-- Footer -->
    <footer class="text-center">
        <div class="container">
            <p class="mb-1"><strong>BrieLLaSparepart</strong></p>
            <p class="mb-0">Bengkel Motor & Sparepart Terpercaya - Solusi Kendaraan Roda 2 Anda</p>
            <p class="mt-2 mb-0"><small>&copy; {{ date('Y') }} BrieLLaSparepart. All rights reserved.</small></p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    @yield('scripts')
</body>
</html>
