<x-layout>
    
        <h1 class="font-bold pl-2 text-3xl">Data Sebaran Satwa</h1>
    
        <br>
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
    <div class="px-4 py-6 sm:px-6 lg:px-8">
        <a href="{{ route('sebaran.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Tambah Sebaran</a>

        <br><br>
        <div class="overflow-x-auto">
            <table class="min-w-full bg-white shadow-md rounded-lg overflow-hidden">
                <thead class="bg-gray-900 text-white">
                    <tr>
                        <th class="py-3 px-4 text-left">No</th>
                        <th class="py-3 px-4 text-left">Satwa</th>
                        <th class="py-3 px-4 text-left">Kawasan</th>
                        <th class="py-3 px-4 text-left">Tanggal</th>
                        <th class="py-3 px-4 text-left">Jumlah</th>
                        <th class="py-3 px-4 text-left">Keterangan</th>
                        <th class="py-3 px-4 text-left">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($sebaran as $index => $item)
                        <tr class="border-b border-gray-200 hover:bg-gray-100 transition-colors duration-200">
                            <td class="py-3 px-4">{{ $index+1 }}</td>
                            <td class="py-3 px-4">{{ $item->satwa->nama_umum }}</td>
                            <td class="py-3 px-4">{{ $item->kawasan->nama_kawasan }}</td>
                            <td class="py-3 px-4">{{ $item->tanggal }}</td>
                            <td class="py-3 px-4">{{ $item->jumlah }}</td>
                            <td class="py-3 px-4">{{ $item->keterangan }}</td>
                            <td class="py-3 px-4">
                                <a href="{{ route('sebaran.edit', $item->id) }}" class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded mr-2">Edit</a>
                                <form id="delete-form-{{ $item->id }}" action="{{ route('sebaran.destroy', $item->id) }}" method="POST">
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
    @foreach ($sebaran as $item)
    <div id="modal-delete-{{ $item->id }}" class="fixed hidden inset-0 z-50 overflow-auto bg-gray-500 bg-opacity-75 flex items-center justify-center">
        <div class="bg-white w-11/12 max-w-lg mx-auto rounded-lg shadow-lg">
            <div class="relative px-12 py-10 bg-white shadow-lg sm:rounded-lg sm:p-8">
                <div class="sm:flex sm:items-start">
                    <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left w-full">
                        <h3 class="text-lg leading-6 font-bold text-gray-900">Konfirmasi Hapus</h3>
                        <div class="mt-2">
                            <p>Apakah Anda yakin ingin menghapus sebaran satwa ini?</p>
                            <div class="flex justify-end mt-4">
                                <button id="delete-confirm-btn-{{ $item->id }}" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Hapus</button>
                                <button class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" onclick="toggleModal('modal-delete-{{ $item->id }}')">Batal</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>    
    @endforeach

    <script>
        function toggleModal(modalId) {
            var modal = document.getElementById(modalId);
            modal.classList.toggle('hidden');
        }
    
        function openDeleteModal(sebaranId) {
            toggleModal('modal-delete-' + sebaranId);
    
            document.getElementById('delete-confirm-btn-' + sebaranId).onclick = function() {
                document.getElementById('delete-form-' + sebaranId).submit();
            };
        }
    </script>
    
    
</x-layout>
