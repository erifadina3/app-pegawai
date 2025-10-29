<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'App Manajemen Pegawai')</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

    <style>
        :root {
            --sidebar-width: 250px;
            --header-height: 60px;
            --sidebar-bg: #2c3e50; 
            --header-bg: #3498db; 
            --active-bg: #2980b9; 
            --highlight-color: #f1c40f; /* Yellow/Gold for Accent */
            --bg-content: #f4f6f9; 
        }

        body {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            background-color: var(--bg-content); 
            overflow-x: hidden;
        }

        .header-top {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: var(--header-height);
            background-color: var(--header-bg);
            color: white;
            z-index: 1030;
            padding: 0 15px;
            padding-left: var(--sidebar-width); 
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.15); 
            display: flex;
            align-items: center;
            justify-content: space-between;
            transition: padding-left 0.3s ease; 
        }

        .header-left {
            display: flex;
            align-items: center;
        }

        .toggle-btn {
            background: none;
            border: none;
            color: white;
            font-size: 1.5rem;
            margin-right: 15px;
            cursor: pointer;
        }

        .sidebar {
            position: fixed;
            top: 0;
            left: 0;
            bottom: 0;
            width: var(--sidebar-width);
            background-color: var(--sidebar-bg);
            color: white;
            z-index: 1040;
            overflow-y: auto;
            border-right: 1px solid rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease; 
        }
        
        .sidebar-brand {
            height: var(--header-height);
            background-color: #2c3e50; 
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem; 
            font-weight: 700;
            letter-spacing: 1px;
            text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.5);
            transition: opacity 0.3s ease; 
        }

        .sidebar-profile {
            padding: 15px 15px;
            text-align: center;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
            margin-bottom: 5px;
        }

        .profile-image {
            font-size: 2.5rem; 
            width: 70px;
            height: 70px;
            border-radius: 50%;
            background-color: #3b5266; 
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 10px;
            border: 3px solid white;
        }

        .profile-name {
            font-weight: bold;
            font-size: 1rem;
            color: white;
        }

        .sidebar .nav-link {
            color: rgba(255, 255, 255, 0.9);
            padding: 1rem 1.5rem;
            transition: all 0.3s ease;
        }

        .sidebar .nav-link:hover {
            background-color: #3b5266; 
            color: white;
        }

        .sidebar .nav-link.active {
            color: white;
            background-color: var(--active-bg);
            border-left: 5px solid var(--highlight-color); 
            font-weight: bold;
        }
        
        .sidebar-heading {
            color: #bdc3c7 !important; 
            padding: 10px 1.5rem 5px; 
            font-size: 0.8rem;
            text-transform: uppercase;
        }

        .content-wrapper {
            margin-top: var(--header-height);
            margin-left: var(--sidebar-width);
            padding: 25px;
            flex: 1;
            transition: margin-left 0.3s ease; 
            background-color: var(--bg-content);
        }

        .footer {
            margin-left: var(--sidebar-width);
            background-color: white;
            border-top: 1px solid #dee2e6;
            padding: 15px 20px;
            text-align: center;
            width: 100%;
            transition: margin-left 0.3s ease; 
        }

        .table-navy > thead > tr > th,
        .table-navy thead {
            background-color: #34495e; 
            color: white;
            border-color: #2c3e50;
        }
        .table-navy th {
            border-bottom-color: #2c3e50 !important;
        }

        .table-bordered, 
        .table-bordered td, 
        .table-bordered th {
            border-color: #ced4da !important; 
        }

        .table-striped > tbody > tr > td {
            border-top: 1px solid #ced4da;
        }

        .toggled .sidebar {
            width: 0 !important;
            overflow: hidden;
        }

        .toggled .sidebar-brand {
            position: fixed;
            top: 0;
            left: 0;
            width: var(--header-height); 
            z-index: 1045;
            justify-content: center;
            padding: 0;
            font-size: 0; 
        } 
        
        .toggled .sidebar-profile {
            opacity: 0; 
        }
        
        .toggled .header-top {
            padding-left: var(--header-height); 
        }

        .toggled .content-wrapper,
        .toggled .footer {
            margin-left: 0 !important;
        }
    </style>
</head>
<body>

    <div class="header-top">
        <div class="header-left">
            <button id="sidebarToggle" class="toggle-btn" aria-label="Toggle navigation">
                <i class="fas fa-bars"></i>
            </button>
            <h5 class="mb-0">@yield('title_content', 'App Pegawai')</h5>
        </div>
        <div></div> 
    </div>

    <nav class="sidebar">
        <div class="sidebar-brand text-white">
            <i class="fas fa-cubes me-2"></i> App Pegawai
        </div>
        
        <div class="sidebar-profile">
            <div class="profile-image">
                <i class="fas fa-user"></i>
            </div>
            <div class="profile-name">Owner/Admin</div> 
        </div>

        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link {{ Request::is('/') ? 'active' : '' }}" href="{{ url('/') }}">
                    <i class="fas fa-tachometer-alt me-2"></i> Dashboard
                </a>
            </li>
            
            <li class="nav-item">
                <a class="nav-link {{ Request::is('employees*') ? 'active' : '' }}" href="{{ url('/employees') }}">
                    <i class="fas fa-users me-2"></i> Karyawan
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Request::is('departments*') ? 'active' : '' }}" href="{{ url('/departments') }}">
                    <i class="fas fa-building me-2"></i> Departemen
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Request::is('positions*') ? 'active' : '' }}" href="{{ url('/positions') }}">
                    <i class="fas fa-user-tie me-2"></i> Jabatan
                </a>
            </li>
            
            <li class="nav-item">
                <a class="nav-link {{ Request::is('attendances*') ? 'active' : '' }}" href="{{ url('/attendances') }}">
                    <i class="fas fa-calendar-check me-2"></i> Kehadiran
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Request::is('salaries*') ? 'active' : '' }}" href="{{ url('/salaries') }}">
                    <i class="fas fa-money-bill-wave me-2"></i> Gaji
                </a>
            </li>
        </ul>
    </nav>

    <div class="content-wrapper">
        <main class="container-fluid">
            @yield('content')
        </main>
    </div>
    
    <footer class="footer">
        <p class="text-muted mb-0">&copy; {{ date('Y') }} App Manajemen Pegawai</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    
    <script>
        document.getElementById('sidebarToggle').addEventListener('click', function() {
            document.body.classList.toggle('toggled');
        });
    </script>
    
    @stack('scripts')
</body>
</html>