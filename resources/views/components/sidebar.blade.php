{{-- resources/views/components/sidebar.blade.php --}}
<div id="sidebar" class="d-flex flex-column flex-shrink-0 p-3 bg-light border-end">
    <a href="{{ route('users.dashboard') }}" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-dark text-decoration-none">

        <span class="fs-4">MyApp</span>
    </a>
    <hr>

    <div class="list-group list-group-flush">
        @auth
            @if(auth()->user()->can('admin.dashboard'))
                <a href="{{ route('admin.dashboard') }}" class="list-group-item list-group-item-action {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                    Dashboard Admin
                </a>
            @endif

            @if(auth()->user()->can('admin.users.index'))
                <a href="{{ route('admin.users.index') }}" class="list-group-item list-group-item-action {{ request()->routeIs('admin.users.*') ? 'active' : '' }}">
                    Manajemen User
                </a>
            @endif

            @if(auth()->user()->can('admin.permissions.index'))
                <a href="{{ route('admin.permissions.index') }}" class="list-group-item list-group-item-action {{ request()->routeIs('admin.permissions.*') ? 'active' : '' }}">
                    Permissions
                </a>
            @endif  

            @if(auth()->user()->can('supervisor.dashboard'))
                <a href="{{ route('supervisor.dashboard') }}" class="list-group-item list-group-item-action {{ request()->routeIs('supervisor.dashboard') ? 'active' : '' }}">
                    Dashboard Supervisor
                </a>
            @endif

            @if(auth()->user()->can('users.dashboard'))
                <a href="{{ route('users.dashboard') }}" class="list-group-item list-group-item-action {{ request()->routeIs('users.dashboard') ? 'active' : '' }}">
                    Dashboard User
                </a>
            @endif

            @if(auth()->user()->can('admin.register'))
                <a href="{{ route('admin.register') }}" class="list-group-item list-group-item-action {{ request()->routeIs('admin.register') ? 'active' : '' }}">
                    Register User
                </a>
            @endif
        @endauth
    </div>

    <hr>
</div>
