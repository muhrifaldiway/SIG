<!-- resources/views/components/sidebar.blade.php -->

<aside class="relative bg-sidebar h-screen w-64 hidden sm:block shadow-xl">
    <div class="p-6">
        <a href="/admin" class="text-white text-3xl font-bold uppercase hover:text-amber-900">SIG</a><br>
        <a class="text-white text-1xl hover:text-amber-950">Sistem Informasi Geografis Sebaran Satwa Sulteng</a>
    </div>
    <nav class="text-white text-base font-semibold pt-3">
        <x-sidebar-link href="{{ route('admin.index') }}" :active="request()->routeIs('admin.*')" icon="fas fa-tachometer-alt">
            Admin
        </x-sidebar-link>
        <x-sidebar-link href="{{ route('users.index') }}" :active="request()->routeIs('user.*')" icon="fas fa-sticky-note">
            User
        </x-sidebar-link>
        <x-sidebar-link href="{{ route('satwa.index') }}" :active="request()->routeIs('satwa.*')" icon="fas fa-table">
            Satwa Endemik
        </x-sidebar-link>
        <x-sidebar-link href="{{ route('kawasan.index') }}" :active="request()->routeIs('kawasan.*')" icon="fas fa-align-left">
            Kawasan Konservasi
        </x-sidebar-link>
        <x-sidebar-link href="{{ route('sebaran.index') }}" :active="request()->routeIs('sebaran.*')" icon="fas fa-map-marked">
            Sebaran Satwa
        </x-sidebar-link>
    </nav>
    
</aside>
