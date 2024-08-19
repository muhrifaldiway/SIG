<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>
    <div class="container mx-auto px-6 py-8">
        <h1 class="text-4xl font-bold text-gray-800 pb-6">Dashboard</h1>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <!-- Card for Jumlah User -->
            <div class="bg-gradient-to-r from-teal-400 to-teal-600 text-white shadow-xl rounded-lg p-6 transform transition-transform duration-300 hover:scale-105 hover:shadow-2xl">
                <div class="flex items-center">
                    <div class="mr-4">
                        <svg class="h-14 w-14 text-white" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 14l9-5-9-5-9 5 9 5z" />
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 14l6.16-3.422a12.083 12.083 0 010 6.844L12 14z" />
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 14L5.84 10.578a12.083 12.083 0 000 6.844L12 14z" />
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 14l6.16 3.422a12.083 12.083 0 010-6.844L12 14z" />
                        </svg>
                    </div>
                    <div>
                        <h2 class="text-3xl text-white font-semibold">USER</h2>
                        <p class="text-4xl text-white font-bold">{{ $jumlahUser }}</p>
                    </div>
                </div>
            </div>

            <!-- Card for Jumlah Admin -->
            <div class="bg-gradient-to-r from-green-400 to-green-500 text-white shadow-xl rounded-lg p-6 transform transition-transform duration-300 hover:scale-105 hover:shadow-2xl">
                <div class="flex items-center">
                    <div class="mr-4">
                        <svg class="h-14 w-14 text-white" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 14l9-5-9-5-9 5 9 5z" />
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 14l6.16-3.422a12.083 12.083 0 010 6.844L12 14z" />
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 14L5.84 10.578a12.083 12.083 0 000 6.844L12 14z" />
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 14l6.16 3.422a12.083 12.083 0 010-6.844L12 14z" />
                        </svg>
                    </div>
                    <div>
                        <h2 class="text-3xl text-white font-semibold">ADMIN</h2>
                        <p class="text-4xl text-white font-bold">{{ $jumlahAdmin }}</p>
                    </div>
                </div>
            </div>
            <div class="bg-gradient-to-r from-red-500 to-red-800 text-white shadow-xl rounded-lg p-6 transform transition-transform duration-300 hover:scale-105 hover:shadow-2xl">
                <div class="flex items-center">
                    <div class="mr-4">
                        <svg class="h-14 w-14 text-white" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 14l9-5-9-5-9 5 9 5z" />
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 14l6.16-3.422a12.083 12.083 0 010 6.844L12 14z" />
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 14L5.84 10.578a12.083 12.083 0 000 6.844L12 14z" />
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 14l6.16 3.422a12.083 12.083 0 010-6.844L12 14z" />
                        </svg>
                    </div>
                    <div>
                        <h2 class="text-3xl text-white font-semibold">SATWA</h2>
                        <p class="text-4xl text-white font-bold">{{ $jumlahSatwa }}</p>
                    </div>
                </div>
            </div>
            <div class="bg-gradient-to-r from-gray-500 to-gray-800 text-white shadow-xl rounded-lg p-6 transform transition-transform duration-300 hover:scale-105 hover:shadow-2xl">
                <div class="flex items-center">
                    <div class="mr-4">
                        <svg class="h-14 w-14 text-white" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 14l9-5-9-5-9 5 9 5z" />
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 14l6.16-3.422a12.083 12.083 0 010 6.844L12 14z" />
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 14L5.84 10.578a12.083 12.083 0 000 6.844L12 14z" />
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 14l6.16 3.422a12.083 12.083 0 010-6.844L12 14z" />
                        </svg>
                    </div>
                    <div>
                        <h2 class="text-3xl text-white font-semibold">KAWASAN</h2>
                        <p class="text-4xl text-white font-bold">{{ $jumlahKawasan }}</p>
                    </div>
                </div>
            </div>
            <div class="bg-gradient-to-r from-amber-500 to-amber-800 text-white shadow-xl rounded-lg p-6 transform transition-transform duration-300 hover:scale-105 hover:shadow-2xl">
                <div class="flex items-center">
                    <div class="mr-4">
                        <svg class="h-14 w-14 text-white" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 14l9-5-9-5-9 5 9 5z" />
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 14l6.16-3.422a12.083 12.083 0 010 6.844L12 14z" />
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 14L5.84 10.578a12.083 12.083 0 000 6.844L12 14z" />
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 14l6.16 3.422a12.083 12.083 0 010-6.844L12 14z" />
                        </svg>
                    </div>
                    <div>
                        <h2 class="text-3xl text-white font-semibold">SEBARAN</h2>
                        <p class="text-4xl text-white font-bold">{{ $jumlahSebaran }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout>
