<nav class="w-64 bg-white border-r border-gray-200 min-h-screen p-4">
    <!-- Logo -->
    <div class="mb-6">
        <a href="{{ route('dashboard') }}">
            <x-application-logo class="h-10 w-auto text-gray-800" />
        </a>
    </div>

    <!-- Navigation Links -->
    <div class="space-y-2">
        <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
            Dashboard
        </x-nav-link>

        <!-- Tambahkan link tambahan jika perlu -->
    </div>

    <!-- User Info & Logout -->
    <div class="mt-10 pt-4 border-t border-gray-300">
        <div class="text-sm text-gray-600">
            <strong>{{ Auth::user()->name }}</strong><br>
            {{ Auth::user()->email }}
        </div>

        <div class="mt-4">
            <a href="{{ route('profile.edit') }}" class="block text-sm text-blue-600 hover:underline">Profile</a>

            <form method="POST" action="{{ route('logout') }}" class="mt-2">
                @csrf
                <button type="submit" class="text-red-500 hover:underline text-sm">Logout</button>
            </form>
        </div>
    </div>
</nav>
