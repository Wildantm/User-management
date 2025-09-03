<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'Beranda') }}</title>

    <!-- Bootstrap CSS & JS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" defer></script>

    <!-- Alpine JS -->
    <script src="//unpkg.com/alpinejs" defer></script>

    <!-- Optional Custom Style -->
    <style>
        .nav-link.active {
            font-weight: bold;
            background-color: rgba(255, 255, 255, 0.2);
            border-radius: 0.25rem;
        }
    </style>
</head>
<body x-data="{ sidebarOpen: false }">

    <!-- Navbar -->
    <nav class="navbar navbar-expand-md navbar-dark bg-dark shadow-sm">
    <div class="container-fluid d-flex justify-content-between align-items-center">

        @auth
            <!-- Sidebar Toggle Button -->
            <button class="btn btn-primary" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasSidebar" aria-controls="offcanvasSidebar">
                Menu
            </button>
        @endauth

        <!-- User Dropdown -->
        <div class="dropdown ms-auto">
            @auth
                <button class="btn btn-outline-light dropdown-toggle" type="button" id="userDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                    {{ Auth::user()->name }}
                </button>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
                    <li>
                        <a class="dropdown-item" href="{{ route('profile.show') }}">Lihat Profil</a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="{{ route('users.edit') }}">Edit Profil</a>
                    </li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>
                    <li>
                        <!-- Trigger Modal Logout -->
                        <button type="button" class="dropdown-item text-danger" data-bs-toggle="modal" data-bs-target="#logoutModal">
                            Logout
                        </button>
                    </li>
                </ul>
            @else
                <a class="btn btn-outline-light" href="{{ route('login') }}">Login</a>
            @endauth
        </div>
    </div>
</nav>

<!-- Modal Logout -->
<div class="modal fade" id="logoutModal" tabindex="-1" aria-labelledby="logoutModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Konfirmasi Logout</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
            </div>
            <div class="modal-body">
                Apakah Anda yakin ingin logout?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                <form method="POST" action="{{ route('logout') }}" class="d-inline">
                    @csrf
                    <button type="submit" class="btn btn-danger">Ya, Logout</button>
                </form>
            </div>
        </div>
    </div>
</div>


    <!-- Sidebar Offcanvas -->
    @auth
        <div class="offcanvas offcanvas-start bg-primary text-white" tabindex="-1" id="offcanvasSidebar" aria-labelledby="offcanvasSidebarLabel">
            <div class="offcanvas-header">
                <h5 class="offcanvas-title" id="offcanvasSidebarLabel">Sidebar</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body">
                <ul class="nav flex-column">
                    @can('users.dashboard')
                        <li class="nav-item">
                            <a class="nav-link text-white {{ request()->routeIs('users.dashboard') ? 'active' : '' }}" href="{{ route('users.dashboard') }}">
                                🏠 Dashboard
                            </a>
                        </li>
                    @endcan

                    @can('admin.dashboard')
                        <li class="nav-item">
                            <a class="nav-link text-white {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}" href="{{ route('admin.dashboard') }}">
                                🏠 Admin Dashboard
                            </a>
                        </li>
                    @endcan

                    @can('supervisor.dashboard')
                        <li class="nav-item">
                            <a class="nav-link text-white {{ request()->routeIs('supervisor.dashboard') ? 'active' : '' }}" href="{{ route('supervisor.dashboard') }}">
                                🏠 Supervisor Dashboard
                            </a>
                        </li>
                    @endcan

                    @can('admin.permissions.index')
                        <li class="nav-item">
                            <a class="nav-link text-white {{ request()->routeIs('admin.permissions.index') ? 'active' : '' }}" href="{{ route('admin.permissions.index') }}">
                                🛡️ Role & Permission
                            </a>
                        </li>
                    @endcan

                    @can('admin.users.index')
                        <li class="nav-item">
                            <a class="nav-link text-white {{ request()->routeIs('admin.users.index') ? 'active' : '' }}" href="{{ route('admin.users.index') }}">
                                🧍 Management User
                            </a>
                        </li>
                    @endcan

                    @can('admin.register')
                        <li class="nav-item">
                            <a class="nav-link text-white {{ request()->routeIs('admin.register') ? 'active' : '' }}" href="{{ route('admin.register') }}">
                                ➕ Register
                            </a>
                        </li>
                    @endcan
                </ul>
            </div>
        </div>
    @endauth

    <!-- Main Content -->
    <main class="min-vh-100 bg-light p-4">
        @yield('content')
    </main>

</body>
</html>
