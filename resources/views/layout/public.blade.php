
<!doctype html>
<html lang="sr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield("title", "Prirodan Eliksir")</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            padding-top: 70px;
        }
        .sidebar {
            min-height: 100vh;
            background-color: #f8f9fa;
        }
        .sidebar a {
            display: block;
            padding: 10px 15px;
            color: #333;
            text-decoration: none;
        }
        .sidebar a:hover {
            background-color: #e2e6ea;
        }
        .logo {
            height: 50px;
        }
    </style>
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top shadow-sm">
    <div class="container-fluid">
        <a class="navbar-brand d-flex align-items-center" href="{{ route('home') }}">
            <img src="{{ asset('tea.png') }}" alt="Logo" class="logo me-2">
            Prirodan Eliksir
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>

      <div class="collapse navbar-collapse" id="mainNavbar">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('teas.index') }}">Ponuda</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('contact') }}">Kontakt</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
    </div>
</nav>

<!-- Layout -->
<div class="container-fluid">
    <div class="row">
        <!-- Sidebar -->
        <aside class="col-md-2 sidebar d-none d-md-block pt-4">
            <a href="{{ route('home') }}">Početna</a>
            <a href="{{ route('teas.index') }}">Ponuda</a>
            <a href="{{ route('contact') }}">Kontakt</a>
        </aside>

        <!-- Main content -->
        <main class="col-md-10 ms-sm-auto px-4 py-4">
            @yield("content")
        </main>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

