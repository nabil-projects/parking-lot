<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8" />
    <title>Parking Lot System</title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="website icon" type="png"
        href="https://e7.pngegg.com/pngimages/46/320/png-clipart-parking-car-park-others-miscellaneous-blue.png">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />

    <!-- Custom Styles -->
    <style>
        body {
            background: linear-gradient(135deg, #1e2a38, #3a5068);
            min-height: 100vh;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            color: #f0f4f8;
        }

        .navbar {
            background-color: #254e70;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.3);
        }

        .navbar-brand {
            font-weight: 700;
            font-size: 1.6rem;
            color: #ffffff !important;
            letter-spacing: 1px;
        }

        .nav-link {
            color: #cbd5e1 !important;
            font-weight: 500;
            transition: color 0.3s ease;
        }

        .nav-link:hover {
            color: #ffffff !important;
        }

        .card {
            border-radius: 1rem;
            box-shadow: 0 8px 24px rgba(0, 0, 0, 0.2);
            background-color: #2e415a;
            color: #e1e8f0;
        }

        .container {
            max-width: 960px;
        }

        footer.footer {
            background-color: #192734;
            color: #8899a6;
            font-size: 0.9rem;
            padding: 1rem 0;
            margin-top: 4rem;
            letter-spacing: 0.03em;
        }
    </style>
</head>

<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg shadow-sm">
        <div class="container">
            <a class="navbar-brand" href="/">Parking System</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="/dashboard">Dashboard</a></li>
                    <li class="nav-item"><a class="nav-link" href="/parking/active">Active Vehicles</a></li>
                    <li class="nav-item"><a class="nav-link" href="/parking/history">History</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Page Content -->
    <div class="container my-5">
        @yield('content')
    </div>

    <!-- Footer -->
    <footer class="footer text-center">
        &copy; {{ date('Y') }} Parking Lot System | All rights reserved.
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>