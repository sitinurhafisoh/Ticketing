<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Ticketing Service')</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Font Awesome (for icons) -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f8f9fa;
        }

        .navbar {
            background-color: #007bff;
        }

        .navbar-brand,
        .nav-link {
            color: white !important;
        }

        .nav-link:hover {
            text-decoration: underline;
        }

        footer {
            background-color: #343a40;
            color: white;
            padding: 1rem 0;
            margin-top: 3rem;
        }

        .card {
            border-radius: 12px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.05);
        }

        .card-header {
            font-weight: bold;
        }
    </style>

    @yield('styles')
</head>
<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg fixed-top">
        <div class="container">
            <a class="navbar-brand" href="/">
                <i class="fas fa-ticket-alt me-2"></i>Ticketing Service
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/tickets/create') }}">Buat Tiket</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/tickets/1') }}">Tiket Saya</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Konten -->
    <main class="py-5 mt-5">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="text-center">
        <div class="container">
            <small>© {{ date('Y') }} Ticketing Service. All Rights Reserved.</small>
        </div>
    </footer>

    <!-- Bootstrap Bundle JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    @yield('scripts')
</body>
</html>

