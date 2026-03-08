<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Dashboard')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
        :root {
            --red-primary: #DC3545;
            --red-dark: #C82333;
        }
        * {
            transition: all 0.3s ease;
        }
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: #f5f5f5;
            animation: fadeIn 0.5s ease;
        }
        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }
        .sidebar {
            min-height: 100vh;
            background: linear-gradient(180deg, #212529, #DC3545);
            color: white;
            animation: slideInLeft 0.5s ease;
            box-shadow: 4px 0 20px rgba(0,0,0,0.1);
        }
        @keyframes slideInLeft {
            from { transform: translateX(-100%); }
            to { transform: translateX(0); }
        }
        .sidebar .nav-link {
            color: rgba(255,255,255,0.8);
            padding: 12px 20px;
            border-radius: 8px;
            margin: 4px 8px;
        }
        .sidebar .nav-link:hover, .sidebar .nav-link.active {
            background: rgba(255,255,255,0.15);
            color: white;
            transform: translateX(5px);
        }
        .main-content {
            padding: 2rem;
            animation: slideInRight 0.5s ease;
        }
        @keyframes slideInRight {
            from { opacity: 0; transform: translateX(20px); }
            to { opacity: 1; transform: translateX(0); }
        }
        .stat-card {
            background: white;
            border-radius: 15px;
            padding: 1.5rem;
            box-shadow: 0 2px 15px rgba(0,0,0,0.08);
            transition: all 0.3s ease;
        }
        .stat-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 10px 30px rgba(0,0,0,0.15);
        }
        .card {
            border-radius: 15px;
            border: none;
            overflow: hidden;
        }
        .card:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 25px rgba(0,0,0,0.12);
        }
        .btn {
            border-radius: 10px;
            font-weight: 500;
            transition: all 0.3s ease;
        }
        .btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 20px rgba(0,0,0,0.15);
        }
        .list-group-item {
            border: none;
            border-bottom: 1px solid #f0f0f0;
            padding: 1rem 0;
            transition: all 0.2s ease;
        }
        .list-group-item:hover {
            background: rgba(220, 53, 69, 0.03);
            padding-left: 10px;
        }
        .card-header {
            border: none;
            font-weight: 600;
        }
    </style>
    @yield('styles')
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <div class="col-md-2 sidebar p-0">
                <div class="p-4 border-bottom border-light border-opacity-25">
                    <div class="d-flex align-items-center mb-2">
                        <div class="bg-warning rounded-circle p-2 me-2" style="width: 40px; height: 40px; display: flex; align-items: center; justify-content: center;">
                            <i class="bi bi-tools text-dark fs-5"></i>
                        </div>
                        <div>
                            <h5 class="fw-bold mb-0">BrieLLaMoto</h5>
                            <small class="opacity-75">Admin Panel</small>
                        </div>
                    </div>
                </div>
                <nav class="nav flex-column mt-3">
                    <a class="nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}" href="{{ route('admin.dashboard') }}">
                        <i class="bi bi-speedometer2 me-2"></i> Dashboard
                    </a>
                    <a class="nav-link {{ request()->routeIs('admin.booking.*') ? 'active' : '' }}" href="{{ route('admin.booking.index') }}">
                        <i class="bi bi-calendar-check me-2"></i> Booking Servis
                    </a>
                    <a class="nav-link {{ request()->routeIs('admin.sparepart.*') ? 'active' : '' }}" href="{{ route('admin.sparepart.index') }}">
                        <i class="bi bi-box-seam me-2"></i> Sparepart
                    </a>
                    <a class="nav-link {{ request()->routeIs('admin.order.*') ? 'active' : '' }}" href="{{ route('admin.order.index') }}">
                        <i class="bi bi-cart-check me-2"></i> Pesanan
                    </a>
                    <a class="nav-link {{ request()->routeIs('admin.article.*') ? 'active' : '' }}" href="{{ route('admin.article.index') }}">
                        <i class="bi bi-file-earmark-text me-2"></i> Artikel
                    </a>
                    <a class="nav-link {{ request()->routeIs('admin.user.*') ? 'active' : '' }}" href="{{ route('admin.user.index') }}">
                        <i class="bi bi-people me-2"></i> Manajemen User
                    </a>
                    <hr class="text-white mx-3 opacity-25">
                    <a class="nav-link" href="{{ route('home') }}" target="_blank">
                        <i class="bi bi-globe me-2"></i> Lihat Website
                    </a>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="nav-link border-0 bg-transparent w-100 text-start">
                            <i class="bi bi-box-arrow-right me-2"></i> Logout
                        </button>
                    </form>
                </nav>
            </div>

            <!-- Main Content -->
            <div class="col-md-10 main-content">
                @yield('content')
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    @yield('scripts')
</body>
</html>



