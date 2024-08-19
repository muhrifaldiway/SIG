<!-- resources/views/satwa.blade.php -->
<x-layout>
    <div class="container mx-auto px-4">
        <h1 class="font-bold text-3xl my-4">Satwa Endemik</h1>
        @if (session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                <span class="block sm:inline">{{ session('success') }}</span>
                <span class="absolute top-0 bottom-0 right-0 px-4 py-3" onclick="this.parentElement.style.display='none';">
                    <svg class="fill-current h-6 w-6 text-green-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                        <path d="M14.348 14.849a1.2 1.2 0 01-1.697 0L10 12.207l-2.651 2.642a1.2 1.2 0 01-1.697-1.697l2.642-2.651-2.642-2.651a1.2 1.2 0 011.697-1.697l2.651 2.642 2.651-2.642a1.2 1.2 0 011.697 1.697l-2.642 2.651 2.642 2.651a1.2 1.2 0 010 1.697z"/>
                    </svg>
                </span>
            </div>
        @endif
        <br>
        <button class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 mb-4" onclick="toggleModal('modal-add')">Tambah Satwa</button>

        <div class="overflow-x-auto bg-white rounded-lg shadow-md">
            <table class="min-w-full leading-normal">
                <thead>
                    <tr class="bg-gray-800 text-white text-left">
                        <th class="py-3 px-4">No</th>
                        <th class="py-3 px-4">Nama Latin</th>
                        <th class="py-3 px-4">Nama Umum</th>
                        <th class="py-3 px-4">Deskripsi</th>
                        <th class="py-3 px-4">Gambar</th>
                        <th class="py-3 px-4">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($satwa as $index => $item)
                        <tr class="border-b border-gray-200">
                            <td class="py-3 px-4">{{ $index+1 }}</td>
                            <td class="py-3 px-4">{{ $item->nama_latin }}</td>
                            <td class="py-3 px-4">{{ $item->nama_umum }}</td>
                            <td class="py-3 px-4">{{ $item->deskripsi }}</td>
                            <td class="py-3 px-4">
                                @if($item->gambar)
                                    <img src="{{ asset('storage/'.$item->gambar) }}" alt="Gambar" class="w-20 h-20 object-cover">
                                @endif
                            </td>
                            <td class="py-3 px-4 flex">
                                <button class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded mr-2" onclick="editSatwa({{ $item }})">Edit</button>
                                <form id="delete-form-{{ $item->id }}" action="{{ route('satwa.destroy', $item->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded" type="button" onclick="openDeleteModal('{{ $item->id }}')">Hapus</button>
                                </form>

                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- Modal Tambah -->
    <div id="modal-add" class="fixed inset-0 bg-gray-800 bg-opacity-75 flex items-center justify-center hidden">
        <div class="bg-white w-11/12 md:max-w-md mx-auto rounded-lg shadow-lg overflow-hidden">
            <div class="px-6 py-4">
                <div class="flex justify-between items-center">
                    <h3 class="text-lg font-semibold">Tambah Satwa</h3>
                    <button class="text-gray-700" onclick="toggleModal('modal-add')">&times;</button>
                </div>
                <form action="{{ route('satwa.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4 mt-4">
                    @csrf
                    <div>
                        <label for="nama_latin" class="block text-sm">Nama Latin</label>
                        <input type="text" name="nama_latin" id="nama_latin" class="w-full mt-1 px-4 py-2 border rounded-md" required>
                    </div>
                    <div>
                        <label for="nama_umum" class="block text-sm">Nama Umum</label>
                        <input type="text" name="nama_umum" id="nama_umum" class="w-full mt-1 px-4 py-2 border rounded-md">
                    </div>
                    <div>
                        <label for="deskripsi" class="block text-sm">Deskripsi</label>
                        <textarea name="deskripsi" id="deskripsi" class="w-full mt-1 px-4 py-2 border rounded-md" rows="3"></textarea>
                    </div>
                    <div>
                        <label for="gambar" class="block text-sm">Gambar</label>
                        <input type="file" name="gambar" id="gambar" class="w-full mt-1 px-4 py-2 border rounded-md" accept="image/*">
                    </div>
                    <div class="flex justify-end">
                        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Simpan</button>
                        <button type="button" class="ml-2 bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600" onclick="toggleModal('modal-add')">Batal</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

   <!-- Modal Edit -->
<div id="modal-edit" class="fixed inset-0 bg-gray-800 bg-opacity-75 flex items-center justify-center hidden">
    <div class="bg-white w-11/12 md:max-w-md mx-auto rounded-lg shadow-lg overflow-hidden">
        <div class="px-6 py-4">
            <div class="flex justify-between items-center">
                <h3 class="text-lg font-semibold">Edit Satwa</h3>
                <button class="text-gray-700" onclick="toggleModal('modal-edit')">&times;</button>
            </div>
            <form id="form-edit" action="" method="POST" enctype="multipart/form-data" class="space-y-4 mt-4">
                @csrf
                @method('PUT') <!-- Menggunakan method PUT -->

                <input type="hidden" name="id" id="edit_id">

                <div>
                    <label for="edit_nama_latin" class="block text-sm">Nama Latin</label>
                    <input type="text" name="nama_latin" id="edit_nama_latin" class="w-full mt-1 px-4 py-2 border rounded-md" required>
                </div>

                <div>
                    <label for="edit_nama_umum" class="block text-sm">Nama Umum</label>
                    <input type="text" name="nama_umum" id="edit_nama_umum" class="w-full mt-1 px-4 py-2 border rounded-md">
                </div>

                <div>
                    <label for="edit_deskripsi" class="block text-sm">Deskripsi</label>
                    <textarea name="deskripsi" id="edit_deskripsi" class="w-full mt-1 px-4 py-2 border rounded-md" rows="3"></textarea>
                </div>

                <div>
                    <label for="edit_gambar" class="block text-sm">Gambar</label>
                    <input type="file" name="gambar" id="edit_gambar" class="w-full mt-1 px-4 py-2 border rounded-md" accept="image/*">
                </div>

                <div class="flex justify-end">
                    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Simpan</button>
                    <button type="button" class="ml-2 bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600" onclick="toggleModal('modal-edit')">Batal</button>
                </div>
            </form>
        </div>
    </div>
</div>



    <!-- Modal Konfirmasi Hapus -->
<div id="modal-delete" class="fixed hidden inset-0 z-50 overflow-auto bg-gray-500 bg-opacity-75 flex items-center justify-center">
    <div class="bg-white w-11/12 max-w-lg mx-auto rounded-lg shadow-lg">
        <div class="relative px-12 py-10 bg-white shadow-lg sm:rounded-lg sm:p-8">
            <div class="sm:flex sm:items-start">
                <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left w-full">
                    <h3 class="text-lg leading-6 font-bold text-gray-900">Konfirmasi Hapus</h3>
                    <div class="mt-2">
                        <p>Apakah Anda yakin ingin menghapus satwa ini?</p>
                        <div class="flex justify-end mt-4">
                            <button id="delete-confirm-btn" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Hapus</button>
                            <button class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" onclick="toggleModal('modal-delete')">Batal</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



    <script>
        function toggleModal(modalID) {
            document.getElementById(modalID).classList.toggle('hidden');
        }

        function editSatwa(satwa) {
        // Set action form sesuai dengan id satwa yang akan diupdate
        document.getElementById('form-edit').action = '/satwa/' + satwa.id;
        document.getElementById('edit_id').value = satwa.id;
        document.getElementById('edit_nama_latin').value = satwa.nama_latin;
        document.getElementById('edit_nama_umum').value = satwa.nama_umum;
        document.getElementById('edit_deskripsi').value = satwa.deskripsi;
        // Kosongkan nilai input gambar agar ter-reset
        document.getElementById('edit_gambar').value = '';
        toggleModal('modal-edit');
    }

        function openDeleteModal(satwaId) {
        // Tampilkan modal konfirmasi
        toggleModal('modal-delete');

        // Setelah pengguna mengonfirmasi, atur event handler untuk tombol "Hapus" di modal
        document.getElementById('delete-confirm-btn').onclick = function() {
            // Submit form penghapusan sesuai dengan id yang dipilih
            document.getElementById('delete-form-' + satwaId).submit();
        };
    }
    </script>
</x-layout>
