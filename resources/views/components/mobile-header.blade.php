<!-- resources/views/components/mobile-header.blade.php -->

<header x-data="{ isOpen: false }" class="w-full bg-sidebar py-5 px-6 sm:hidden">
    <div class="flex items-center justify-between">
        <a href="index.html" class="text-white text-3xl font-semibold uppercase hover:text-gray-300">Admin</a>
        <button @click="isOpen = !isOpen" class="text-white text-3xl focus:outline-none">
            <i x-show="!isOpen" class="fas fa-bars"></i>
            <i x-show="isOpen" class="fas fa-times"></i>
        </button>
    </div>

    <nav class="text-white text-base font-semibold pt-3">
        <x-sidebar-link href="/admin" :active="request()->is('admin')" icon="fas fa-tachometer-alt">
            Admin
        </x-sidebar-link>
        <x-sidebar-link href="/user" :active="request()->is('user')" icon="fas fa-sticky-note">
            User
        </x-sidebar-link>
        <x-sidebar-link href="/satwaEndemik" :active="request()->is('satwaEndemik')" icon="fas fa-table">
            Satwa Endemik
        </x-sidebar-link>
        <x-sidebar-link href="/kawasanKonservasi" :active="request()->is('kawasanKonservasi')" icon="fas fa-align-left">
            Kawasan Konservasi
        </x-sidebar-link>
        
        <x-sidebar-link href="/Sebaran" :active="request()->is('Sebaran')" icon="fas fa-align-left">
            Sebaran Satwa
        </x-sidebar-link>
        
    </nav>
</header>
