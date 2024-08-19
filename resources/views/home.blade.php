<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>SIG Satwa Sulteng</title>
        <link rel="stylesheet" href="{{ asset('assets/assets/css/tailwind.css') }}">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap" rel="stylesheet">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.28.0/feather.min.js" integrity="sha512-7x3zila4t2qNycrtZ31HO0NnJr8kg2VI67YLoRSyi9hGhRN66FHYWr7Axa9Y1J9tGYHVBPqIjSE1ogHrJTz51g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>

        <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
     integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY="
     crossorigin=""/>
     <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
     integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo="
     crossorigin=""></script>
    </head> 

    <body class="font-body">

        <!-- home section -->
        <section class="bg-white mb-20 md:mb-52 xl:mb-72">

            <div class="container max-w-screen-xl mx-auto px-4">

                <nav class="flex-wrap lg:flex items-center py-14 xl:relative z-10" x-data="{navbarOpen:false}">

                    <div class="flex items-center justify-between mb-10 lg:mb-0">
                        <img src="{{ asset('assets/assets/image/logo1.png') }}" alt="Logo img" class="w-52 md:w-80 lg:w-full">

                        <button class="lg:hidden w-10 h-10 ml-auto flex items-center justify-center text-green-700 border border-green-700 rounded-md" @click="navbarOpen = !navbarOpen">
                            <i data-feather="menu"></i>
                        </button>
                    </div>

                    <ul class="lg:flex flex-col lg:flex-row lg:items-center lg:mx-auto lg:space-x-8 xl:space-x-16" :class="{'hidden':!navbarOpen,'flex':navbarOpen}">

                        <li class="font-semibold text-green-900 text-lg hover:text-amber-800 transition ease-in-out duration-300 mb-5 lg:mb-0">
                            <a href="{{ url('/home') }}">Home</a>
                        </li>
        
                        <li class="font-semibold text-green-900 text-lg hover:text-amber-800 transition ease-in-out duration-300 mb-5 lg:mb-0">
                            <a href="#gallery">Gallery</a>
                        </li>
                        <li class="font-semibold text-green-900 text-lg hover:text-amber-800 transition ease-in-out duration-300 mb-5 lg:mb-0">
                            <a href="#sebaran">Sebaran</a>
                        </li>
                        <li class="font-semibold text-green-900 text-lg hover:text-amber-800 transition ease-in-out duration-300 mb-5 lg:mb-0">
                            <a href="{{ url('/about') }}">About</a>
                        </li>

                    </ul>

                    <button class="px-5 py-3 lg:block border-2 border-green-700 rounded-lg font-semibold text-green-700 text-lg hover:bg-green-700 hover:text-white transition ease-linear duration-500" :class="{'hidden': !navbarOpen, 'flex': navbarOpen}" onclick="window.location='{{ route('login') }}'">
                        Login
                    </button>


                </nav>

                <div class="flex items-center justify-center xl:justify-start">

                    <div class="mt-28 text-center xl:text-left">
                        <h1 class="font-semibold text-4xl md:text-6xl lg:text-7xl text-gray-900 leading-normal mb-6">Temukan informasi<br> SIG Satwa Sulteng
                            <br>sekarang juga,</h1>

                        <p class="font-normal text-xl text-gray-400 leading-relaxed mb-12">Nikmati Pengalaman Anda <br> Bersama Kami!</p>

                        <a class="px-6 py-4 bg-green-900 text-white font-semibold text-lg rounded-xl hover:bg-yellow-800 transition ease-in-out duration-500" href="#satwa">Get Started</a>
                    </div>

                    <div class="hidden xl:block xl:absolute z-0 top-0 right-0">
                        <img src="{{ asset('assets/assets/image/home2.png') }}" alt="Home img">
                    </div>

                </div>

            </div> <!-- container.// -->

        </section>
        <!-- home section //nd -->
    
        <!-- feature section -->
        <section class="bg-white py-10 md:py-16 xl:relative">

            <div class="container max-w-screen-xl mx-auto px-4">

            <div class="flex flex-col xl:flex-row justify-end">

                    <div class="hidden xl:block xl:absolute left-0 bottom-0 w-full">
                        <img src="{{ asset('assets/assets/image/animal1.png') }}" alt="Feature img">
                    </div>

                    <div class="">

                        <h1 id="satwa" class="font-semibold text-gray-900 text-xl md:text-4xl text-center leading-normal mb-6">3 Cara Menjaga Kelestarian <br> Satwa Endemik!</h1>

                        <p class="font-normal text-gray-400 text-md md:text-xl text-center mb-16">Jagalah kelestarian alam kalian! <br> terutama yang menjadi bagian satwa endemik</p>

                        <div class="flex flex-col md:flex-row justify-center xl:justify-start space-x-4 mb-20">
                            <div class="px-8 h-20 mx-auto md:mx-0 bg-gray-200 rounded-lg flex items-center justify-center mb-5 md:mb-0">
                                <i data-feather="check-circle" class=" text-green-900"></i>
                            </div>
                            
                            <div class="text-center md:text-left">
                                <h4 class="font-semibold text-gray-900 text-2xl mb-2">Pelestarian Habitat:</h4>
                                <p class="font-normal text-gray-400 text-xl leading-relaxed">Lindungi habitat alami satwa endemik melalui <br> konservasi dan restorasi.</p>
                            </div>
                        </div>

                        <div class="flex flex-col md:flex-row justify-center xl:justify-start space-x-4 mb-20">
                            <div class="px-8 h-20 mx-auto md:mx-0 bg-gray-200 rounded-lg flex items-center justify-center mb-5 md:mb-0">
                                <i data-feather="lock" class=" text-green-900"></i>
                            </div>

                            <div class="text-center md:text-left">
                                <h4 class="font-semibold text-gray-900 text-2xl mb-2">Penegakan Hukum:</h4>
                                <p class="font-normal text-gray-400 text-xl leading-relaxed">Tegakkan hukum melawan perburuan <br>dan perdagangan satwa liar.</p>
                            </div>
                        </div>

                        <div class="flex flex-col md:flex-row justify-center xl:justify-start space-x-4">
                            <div class="px-8 h-20 mx-auto md:mx-0 bg-gray-200 rounded-lg flex items-center justify-center mb-5 md:mb-0">
                                <i data-feather="credit-card" class=" text-green-900"></i>
                            </div>

                            <div class="text-center md:text-left">
                                <h4 class="font-semibold text-gray-900 text-2xl mb-2">Edukasi dan Kesadaran:</h4>
                                <p class="font-normal text-gray-400 text-xl leading-relaxed">Edukasi masyarakat tentang pentingnya <br> satwa endemik dan konservasi.</p>
                            </div>
                        </div>

                    </div>

            </div>

            </div> <!-- container.// -->

        </section>
        <!-- feature section //end -->
        
        <!-- testimoni section -->
        <section class="bg-white py-10 md:py-16">

            <div class="container max-w-screen-xl mx-auto px-4 xl:relative">

                <p class="font-normal text-gray-400 text-lg md:text-xl text-center uppercase mb-6" id="gallery">Gallery Satwa</p>

                <h1 class="font-semibold text-gray-900 text-2xl md:text-4xl text-center leading-normal mb-14">Satwa <br> Endemik</h1>

                <div class="hidden xl:block xl:absolute top-0">
                    <img src="{{ asset('assets/assets/image/testimoni-1.png') }}" alt="Image">
                </div>

                <div class="hidden xl:block xl:absolute top-32">
                    <img src="{{ asset('assets/assets/image/testimoni-2.png') }}" alt="Image">
                </div>

                
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8 justify-center mb-10 md:mb-20">
                    @foreach ($sebaranData as $index => $satwa)
                        <div class="bg-gray-100 rounded-lg">
                            <img src="{{ asset($satwa['gambar']) }}" alt="Gambar Satwa" class="mx-auto my-8 w-64">
                            
                            <div class="text-center px-4">
                                <p class="text-sm text-gray-400 my-4">{{ $satwa['nama_latih'] }}</p>
                                <h3 class="font-semibold text-gray-900 text-xl md:text-2xl lg:text-3xl mb-8">{{ $satwa['nama_umum'] }}</h3>
                            </div>
                        </div>
                
                        @if (($index + 1) % 4 == 0)
                            </div><div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8 justify-center mb-10 md:mb-20">
                        @endif
                    @endforeach
                </div>
                

            </div> <!-- container.// -->

        </section>
            
        <section class="bg-white py-10 md:py-16" id="sebaran">
            <p class="font-normal text-gray-400 text-lg md:text-xl text-center uppercase mb-6">Sebaran Satwa</p>
                <h1 class="font-semibold text-gray-900 text-2xl md:text-4xl text-center leading-normal mb-14">Satwa Endemik <br> Sulawesi Tengah</h1>
            <div class="container max-w-screen-xl mx-auto px-4">
                <div id="map" style="height: 500px;"></div> <!-- Peta akan ditampilkan di sini -->
            </div>
        </section>
        
        <!-- book section //end -->

        <!-- footer -->
        <footer class="bg-white py-10 md:py-16">

            <div class="container max-w-screen-xl mx-auto px-4">

                <div class="flex flex-col lg:flex-row justify-between">
                    <div class="text-center lg:text-left mb-10 lg:mb-0">
                        <div class="flex justify-center lg:justify-start mb-5">
                            <img src="{{ asset('assets/assets/image/logo1.png') }}" alt="Image">
                        </div>

                        <p class="font-light text-gray-400 text-xl mb-10">Temukan informasi
                            SIG Satwa Sulteng
                            <br> sekarang juga</p>

                        <div class="flex items-center justify-center lg:justify-start space-x-5">
                            <a href="#" class="px-3 py-3 bg-gray-200 text-gray-700 rounded-full hover:bg-green-800 hover:text-white transition ease-in-out duration-500">
                                <i data-feather="facebook"></i>
                            </a>

                            <a href="#" class="px-3 py-3 bg-gray-200 text-gray-700 rounded-full hover:bg-green-800 hover:text-white transition ease-in-out duration-500">
                                <i data-feather="twitter"></i>
                            </a>

                            <a href="#" class="px-3 py-3 bg-gray-200 text-gray-700 rounded-full hover:bg-green-800 hover:text-white transition ease-in-out duration-500">
                                <i data-feather="linkedin"></i>
                            </a>
                        </div>
                    </div>
                   
                </div>

            </div> <!-- container.// -->

        </footer>
        <!-- footer //end -->

        <script>
            feather.replace()
        </script>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Inisialisasi peta
        var map = L.map('map').setView([-1.443379188614197, 119.9861757299177], 8); // Koordinat awal dan zoom level

        // Menambahkan layer tile ke peta
        L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 19,
            attribution: '© OpenStreetMap'
        }).addTo(map);

        // Data marker dari backend
        var sebaranData = @json($sebaranData); // Mengambil data dari controller

        sebaranData.forEach(function (data) {
            var popupContent = '<b>' + data.nama_latih + '</b><br>' + data.keterangan;

            // Jika ada gambar, tambahkan ke dalam popup
            if (data.gambar) {
                popupContent += '<br><img src="' + data.gambar + '" alt="Gambar" style="max-width: 100%; height: auto;">';
            }

            L.marker([data.latitude, data.longitude])
                .addTo(map)
                .bindPopup(popupContent);
        });
    });
</script>





    </body>
</html>