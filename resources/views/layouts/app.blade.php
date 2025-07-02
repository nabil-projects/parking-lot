<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Parking Management System</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap 5.3 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #1e2a38, #3a5068);
        }
        .navbar-brand {
            font-weight: bold;
            font-size: 1.4rem;
        }
        .nav-link,
        .btn-nav {
            margin-right: 0.5rem;
            transition: all 0.3s ease;
        }
        .btn-nav:hover {
            background-color: rgba(255, 255, 255, 0.15);
            color: #f8f9fa !important;
        }
        footer {
            background: #f8f9fa;
            font-size: 0.9rem;
            color: #6c757d;
        }
        nav{
            background-color: #254e70;
        }
    </style>
</head>

<body class="bg-light">

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark shadow-sm">
        <div class="container">
            <a class="navbar-brand" href="{{ route('dashboard') }}">
                 Parking System
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <div class="d-flex flex-wrap gap-2">
                    <a class="btn btn-outline-light btn-sm btn-nav" href="{{ route('vehicles.index') }}">
                        <i class="bi bi-list-ul me-1"></i> All Vehicles
                    </a>
                    <a class="btn btn-outline-light btn-sm btn-nav" href="{{ route('vehicles.active') }}">
                        <i class="bi bi-clock-history me-1"></i> Active Vehicles
                    </a>
                    <a class="btn btn-outline-light btn-sm btn-nav" href="{{ route('history') }}">
                        <i class="bi bi-clock me-1"></i> Parking History
                    </a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main class="container py-4">
        @yield('content')
    </main>



    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
