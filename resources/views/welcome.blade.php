<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Golden Strategy</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/css/app.css','resources/js/app.js'])
    <style>
        body {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        .hero-card {
            background: rgba(255, 255, 255, 0.95);
            border-radius: 20px;
            padding: 3rem;
            box-shadow: 0 20px 60px rgba(0,0,0,0.3);
            backdrop-filter: blur(10px);
        }
        .logo-icon {
            width: 80px;
            height: 80px;
            background: linear-gradient(135deg, #ffd700, #ffed4e);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 2.5rem;
            margin: 0 auto 1.5rem;
            box-shadow: 0 10px 25px rgba(255, 215, 0, 0.4);
        }
        .btn-login {
            background: linear-gradient(135deg, #667eea, #764ba2);
            border: none;
            padding: 12px 40px;
            font-size: 1.1rem;
            border-radius: 50px;
            transition: transform 0.3s, box-shadow 0.3s;
        }
        .btn-login:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 25px rgba(102, 126, 234, 0.4);
        }
    </style>
</head>
<body>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-6 col-md-8">
            <div class="hero-card text-center">
                <div class="logo-icon">🍈</div>
                
                <h1 class="display-4 fw-bold text-dark mb-3">
                    GOLDEN STRATEGY
                </h1>

                <p class="lead text-secondary mb-4">
                    Sistem Pemberdayaan SDM KWT melalui Branding dan Penguatan Rantai Pasok
                    <strong class="text-warning">Melon Golden Aroma Hidroponik</strong>
                </p>

                <div class="mb-4 p-3 bg-light rounded">
                    <p class="mb-0 text-muted">
                        Website sistem informasi untuk mendukung pengembangan
                        <strong>Desa Wirausaha Berbasis Pertanian Modern</strong>
                    </p>
                </div>

                <button class="btn btn-login btn-lg text-white px-5">
                    <i class="bi bi-box-arrow-in-right"></i> Login
                </button>

                <div class="mt-4">
                    <small class="text-muted">Sistem Berhasil Dijalankan 🚀</small>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>

