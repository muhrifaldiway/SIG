<!-- resources/views/kawasan/index.blade.php -->
<x-layout>
    <div class="container mx-auto py-8">
        <h1 class="text-3xl font-bold mb-6">Daftar Kawasan Konservasi</h1>
        
        @if(session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                <span class="block sm:inline">{{ session('success') }}</span>
                <span class="absolute top-0 bottom-0 right-0 px-4 py-3" onclick="this.parentElement.style.display='none';">
                    <svg class="fill-current h-6 w-6 text-green-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                        <path d="M14.348 14.849a1.2 1.2 0 01-1.697 0L10 12.207l-2.651 2.642a1.2 1.2 0 01-1.697-1.697l2.642-2.651-2.642-2.651a1.2 1.2 0 011.697-1.697l2.651 2.642 2.651-2.642a1.2 1.2 0 011.697 1.697l-2.642 2.651 2.642 2.651a1.2 1.2 0 010 1.697z"/>
                    </svg>
                </span>
            </div>
        @endif

        <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" onclick="toggleModal('addModal')">Tambah Kawasan</button>
        
        <div class="overflow-x-auto mt-6">
            <table class="min-w-full bg-white shadow-md rounded-lg overflow-hidden">
                <thead class="bg-gray-800 text-white">
                    <tr>
                        <th class="py-3 px-4 text-left">No</th>
                        <th class="py-3 px-4 text-left">Nama Kawasan</th>
                        <th class="py-3 px-4 text-left">Lokasi</th>
                        <th class="py-3 px-4 text-left">Deskripsi</th>
                        <th class="py-3 px-4 text-left">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($kawasan as $index => $k)
                        <tr class="border-b border-gray-200 hover:bg-gray-100 transition-colors duration-200">
                            <td class="py-3 px-4">{{ $index+1 }}</td>
                            <td class="py-3 px-4">{{ $k->nama_kawasan }}</td>
                            <td class="py-3 px-4">{{ $k->lokasi }}</td>
                            <td class="py-3 px-4">{{ $k->deskripsi }}</td>
                            <td class="py-3 px-4">
                                <button class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded" onclick="openEditModal({{ $k }})">Edit</button>
                                <button class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded" onclick="openDeleteModal({{ $k->id }})">Hapus</button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- Modal Tambah Kawasan -->
    <div id="addModal" class="fixed hidden inset-0 z-50 overflow-auto bg-gray-500 bg-opacity-75 flex items-center justify-center">
        <div class="bg-white w-11/12 max-w-lg mx-auto rounded-lg shadow-lg">
            <div class="relative px-12 py-10 bg-white shadow-lg sm:rounded-lg sm:p-8">
                <div class="sm:flex sm:items-start">
                    <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left w-full">
                        <h3 class="text-lg leading-6 font-bold text-gray-900">Tambah Kawasan Konservasi</h3>
                        <div class="mt-2">
                            <form action="{{ route('kawasan.store') }}" method="POST" class="space-y-4">
                                @csrf
                                <div>
                                    <label for="nama_kawasan" class="block text-sm font-medium text-gray-700">Nama Kawasan</label>
                                    <input type="text" name="nama_kawasan" id="nama_kawasan" required
                                           class="mt-1 block w-full px-3 py-2 border border-gray-300 shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm rounded-md"
                                           value="{{ old('nama_kawasan') }}">
                                </div>
                                <div>
                                    <label for="lokasi" class="block text-sm font-medium text-gray-700">Lokasi</label>
                                    <input type="text" name="lokasi" id="lokasi" required
                                           class="mt-1 block w-full px-3 py-2 border border-gray-300 shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm rounded-md"
                                           value="{{ old('lokasi') }}">
                                </div>
                                <div>
                                    <label for="deskripsi" class="block text-sm font-medium text-gray-700">Deskripsi</label>
                                    <textarea name="deskripsi" id="deskripsi" rows="3" class="mt-1 block w-full px-3 py-2 border border-gray-300 shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm rounded-md">{{ old('deskripsi') }}</textarea>
                                </div>
                                <div class="flex justify-end mt-4">
                                    <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Simpan</button>
                                    <button type="button" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" onclick="toggleModal('addModal')">Batal</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Edit Kawasan -->
    <div id="editModal" class="fixed hidden inset-0 z-50 overflow-auto bg-gray-500 bg-opacity-75 flex items-center justify-center">
        <div class="bg-white w-11/12 max-w-lg mx-auto rounded-lg shadow-lg">
            <div class="relative px-12 py-10 bg-white shadow-lg sm:rounded-lg sm:p-8">
                <div class="sm:flex sm:items-start">
                    <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left w-full">
                        <h3 class="text-lg leading-6 font-bold text-gray-900">Edit Kawasan Konservasi</h3>
                        <div class="mt-2">
                            <form id="editForm" method="POST" class="space-y-4">
                                @csrf
                                @method('PUT')
                                <div>
                                    <label for="edit_nama_kawasan" class="block text-sm font-medium text-gray-700">Nama Kawasan</label>
                                    <input type="text" name="nama_kawasan" id="edit_nama_kawasan" required
                                           class="mt-1 block w-full px-3 py-2 border border-gray-300 shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm rounded-md">
                                </div>
                                <div>
                                    <label for="edit_lokasi" class="block text-sm font-medium text-gray-700">Lokasi</label>
                                    <input type="text" name="lokasi" id="edit_lokasi" required
                                           class="mt-1 block w-full px-3 py-2 border border-gray-300 shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm rounded-md">
                                </div>
                                <div>
                                    <label for="edit_deskripsi" class="block text-sm font-medium text-gray-700">Deskripsi</label>
                                    <textarea name="deskripsi" id="edit_deskripsi" rows="3" class="mt-1 block w-full px-3 py-2 border border-gray-300 shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm rounded-md"></textarea>
                                </div>
                                <div class="flex justify-end mt-4">
                                    <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Simpan</button>
                                    <button type="button" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" onclick="toggleModal('editModal')">Batal</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Hapus Kawasan -->
    <div id="deleteModal" class="fixed hidden inset-0 z-50 overflow-auto bg-gray-500 bg-opacity-75 flex items-center justify-center">
        <div class="bg-white w-11/12 max-w-lg mx-auto rounded-lg shadow-lg">
            <div class="relative px-12 py-10 bg-white shadow-lg sm:rounded-lg sm:p-8">
                <div class="sm:flex sm:items-start">
                    <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left w-full">
                        <h3 class="text-lg leading-6 font-bold text-gray-900">Hapus Kawasan Konservasi</h3>
                        <div class="mt-2">
                            <p>Apakah Anda yakin ingin menghapus kawasan konservasi ini?</p>
                            <form id="deleteForm" method="POST" class="space-y-4">
                                @csrf
                                @method('DELETE')
                                <div class="flex justify-end mt-4">
                                    <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Hapus</button>
                                    <button type="button" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" onclick="toggleModal('deleteModal')">Batal</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-layout>

<script>
    function toggleModal(modalID) {
        document.getElementById(modalID).classList.toggle('hidden');
        document.getElementById(modalID).classList.toggle('flex');
    }

    function openEditModal(kawasan) {
        document.getElementById('editForm').action = '/kawasan/' + kawasan.id;
        document.getElementById('edit_nama_kawasan').value = kawasan.nama_kawasan;
        document.getElementById('edit_lokasi').value = kawasan.lokasi;
        document.getElementById('edit_deskripsi').value = kawasan.deskripsi;
        toggleModal('editModal');
    }

    function openDeleteModal(id) {
        document.getElementById('deleteForm').action = '/kawasan/' + id;
        toggleModal('deleteModal');
    }
</script>
