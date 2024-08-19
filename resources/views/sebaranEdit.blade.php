@php
    use Illuminate\Support\Facades\Auth;
@endphp

<x-layout>
    <x-slot:title>Edit Sebaran</x-slot>

    <h1 class="text-3xl font-bold mb-4">Edit Sebaran</h1>

    @if ($errors->any())
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
            <strong class="font-bold">Ada yang salah dengan inputan Anda</strong>
            <ul class="mt-3 list-disc list-inside text-sm text-red-600">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif


    <form action="{{ route('sebaran.update', $sebaran->id) }}" method="POST" class="flex">
        @csrf
        @method('PUT')

        <!-- Form Input -->
        <div class="w-1/2 pr-4">
            <div class="mb-4">
                <label for="satwa_id" class="block text-sm font-medium text-gray-700">Satwa Endemik</label>
                <select name="satwa_id" id="satwa_id" class="block w-full mt-1 py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                    <option value="">Silahkan pilih!</option>
                    @foreach ($satwa as $s)
                        <option value="{{ $s->id }}" {{ $s->id == $sebaran->satwa_id ? 'selected' : '' }}>{{ $s->nama_umum }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-4">
                <label for="kawasan_id" class="block text-sm font-medium text-gray-700">Kawasan Konservasi</label>
                <select name="kawasan_id" id="kawasan_id" class="block w-full mt-1 py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                    <option value="">Silahkan pilih!</option>
                    @foreach ($kawasan as $k)
                        <option value="{{ $k->id }}" {{ $k->id == $sebaran->kawasan_id ? 'selected' : '' }}>{{ $k->nama_kawasan }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-4">
                <label for="user" class="block text-sm font-medium text-gray-700">User</label>
                <input type="text" name="user" id="user" readonly
                       class="mt-1 block w-full px-3 py-2 border border-gray-300 bg-gray-200 shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm rounded-md"
                       value="{{ Auth::user()->name ?? '' }}" required>
                <input type="hidden" name="user_id" value="{{ Auth::id() }}">
            </div>

            <div class="mb-4">
                <label for="tanggal" class="block text-sm font-medium text-gray-700">Tanggal</label>
                <input type="date" name="tanggal" id="tanggal" class="block w-full mt-1 py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm" value="{{ \Carbon\Carbon::parse($sebaran->tanggal)->format('Y-m-d') }}">
            </div>

            <div class="mb-4">
                <label for="jumlah" class="block text-sm font-medium text-gray-700">Jumlah</label>
                <input type="number" name="jumlah" id="jumlah" class="block w-full mt-1 py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm" value="{{ $sebaran->jumlah }}">
            </div>

            <div class="mb-4">
                <label for="keterangan" class="block text-sm font-medium text-gray-700">Keterangan</label>
                <textarea name="keterangan" id="keterangan" rows="3" class="block w-full mt-1 py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">{{ $sebaran->keterangan }}</textarea>
            </div>

            <div class="mb-4">
                <label for="latitude" class="block text-sm font-medium text-gray-700">Latitude</label>
                <input type="text" name="latitude" id="latitude" class="block w-full mt-1 py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm" value="{{ $sebaran->latitude }}">
            </div>

            <div class="mb-4">
                <label for="longitude" class="block text-sm font-medium text-gray-700">Longitude</label>
                <input type="text" name="longitude" id="longitude" class="block w-full mt-1 py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm" value="{{ $sebaran->longitude }}">
            </div>

            <div class="flex justify-end">
                <a href="{{ route('sebaran.index') }}" class="inline-block bg-gray-300 text-gray-700 px-4 py-2 rounded-md mr-2">Batal</a>
                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50">Simpan</button>
            </div>
        </div>

        <!-- Peta Leaflet -->
        <div class="w-1/2">
            <div id="map" style="height: 600px;"></div>
        </div>
    </form>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var map = L.map('map').setView([{{ $sebaran->latitude }}, {{ $sebaran->longitude }}], 8); // Set zoom level to 8

            L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
                maxZoom: 18,
            }).addTo(map);

            // Tambahkan marker jika koordinat sudah dipilih
            var latitudeField = document.getElementById('latitude');
            var longitudeField = document.getElementById('longitude');
            var marker = L.marker([{{ $sebaran->latitude }}, {{ $sebaran->longitude }}]).addTo(map);

            // Event listener untuk menambahkan marker pada klik peta
            map.on('click', function (e) {
                latitudeField.value = e.latlng.lat.toFixed(6);
                longitudeField.value = e.latlng.lng.toFixed(6);

                // Hapus marker sebelumnya jika ada
                if (marker) {
                    map.removeLayer(marker);
                }

                marker = L.marker([e.latlng.lat, e.latlng.lng]).addTo(map);
            });

            // Fungsi untuk menampilkan popup saat peta diklik
            function onMapClick(e) {
                popup
                    .setLatLng(e.latlng)
                    .setContent("Anda mengklik peta di koordinat " + e.latlng.toString())
                    .openOn(map);
            }

            map.on('click', onMapClick);

            // Tambahkan kontrol pencarian dengan leaflet-geosearch
            var searchControl = new GeoSearch.GeoSearchControl({
                provider: new GeoSearch.OpenStreetMapProvider(),
                style: 'bar',
                autoClose: true,
                retainZoomLevel: false,
                animateZoom: true,
                keepResult: true,
                searchLabel: 'Masukkan lokasi'
            });

            map.addControl(searchControl);

            // Event listener untuk memperbaharui marker saat nilai latitude dan longitude berubah
            latitudeField.addEventListener('input', function () {
                var latlng = [latitudeField.value, longitudeField.value];
                marker.setLatLng(latlng).addTo(map);
                map.panTo(latlng);
            });

            longitudeField.addEventListener('input', function () {
                var latlng = [latitudeField.value, longitudeField.value];
                marker.setLatLng(latlng).addTo(map);
                map.panTo(latlng);
            });
        });
    </script>
</x-layout>
