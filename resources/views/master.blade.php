<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Aplikasi Manajemen Pegawai')</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <style>
        /* Gaya dasar untuk memastikan footer di bawah */
        body {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }
        main.container {
            flex: 1; /* Konten utama akan mengambil ruang sisa */
        }
    </style>
</head>
<body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow-sm">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">App Pegawai</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('employees*') ? 'active' : '' }}" href="{{ url('/employees') }}">Karyawan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('departments*') ? 'active' : '' }}" href="{{ url('/departments') }}">Departemen</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('positions*') ? 'active' : '' }}" href="{{ url('/positions') }}">Jabatan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('attendances*') ? 'active' : '' }}" href="{{ url('/attendances') }}">Kehadiran</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('salaries*') ? 'active' : '' }}" href="{{ url('/salaries') }}">Gaji</a>
                    </li>
                </ul>
                </div>
        </div>
    </nav>

    <main class="container py-4">
        @yield('content')
    </main>
    
    <footer class="bg-light border-top mt-auto">
        <div class="container py-3">
            <p class="text-center text-muted mb-0">&copy; {{ date('Y') }} App Pegawai</p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    @stack('scripts')
</body>
</html>