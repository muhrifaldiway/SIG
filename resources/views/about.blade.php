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

        <section class="bg-white py-10 md:py-16 xl:relative">

            <div class="container max-w-screen-xl mx-auto px-4">
        
                <div class="flex flex-col xl:flex-row justify-end items-start">
        
                    <div class="flex items-center justify-between mb-10 lg:mb-0">
                        <img src="{{ asset('assets/assets/image/about.jpg') }}" alt="Feature img" class="w-10/12 h-auto object-cover">
                    </div>                    
        
                    <div class="xl:pl-50 w-full-50">
                        <h1 class="font-semibold text-gray-900 text-xl md:text-4xl text-center xl:text-left leading-normal mb-6">About <br> SIG Sebaran Satwa Endemik</h1>
        
                        <div class="flex flex-col md:flex-row xl:flex-col justify-center xl:justify-start space-x-4 mb-20">
                            <div class="px-8 h-20 mx-auto md:mx-0 bg-green-800 rounded-lg flex items-center justify-center mb-5 md:mb-0">
                                <h4 class="font-semibold text-gray-100 text-2xl mb-2">Tujuan Website:</h4>
                                <i data-feather="check-circle" class="text-green-900"></i>
                            </div>
                            <div class="text-center md:text-left xl:text-left">
                                <p class="font-normal text-gray-400 text-xl leading-relaxed">SIG Sebaran Satwa Endemik bertujuan untuk mengumpulkan, mengelola, dan menyajikan data mengenai distribusi satwa endemik di berbagai wilayah. Platform ini mendukung upaya konservasi dengan menyediakan informasi yang akurat dan mudah diakses mengenai lokasi spesies-spesies yang perlu dilindungi.</p>
                            </div>
                        </div>
        
                        <div class="flex flex-col md:flex-row xl:flex-col justify-center xl:justify-start space-x-4 mb-20">
                            <div class="px-8 h-20 mx-auto md:mx-0 bg-green-800 rounded-lg flex items-center justify-center mb-5 md:mb-0">
                                <h4 class="font-semibold text-gray-100 text-2xl mb-2">Fungsi dan Manfaat:</h4>
                                <i data-feather="layers" class="text-green-900"></i>
                            </div>
                            <div class="text-center md:text-left xl:text-left">
                                <p class="font-normal text-gray-400 text-xl leading-relaxed">Menyediakan peta interaktif yang menunjukkan lokasi persebaran satwa endemik, mendukung penelitian dan pembuatan kebijakan konservasi, serta meningkatkan kesadaran masyarakat tentang pentingnya perlindungan satwa endemik.</p>
                            </div>
                        </div>
        
                        <div class="flex flex-col md:flex-row xl:flex-col justify-center xl:justify-start space-x-4 mb-20">
                            <div class="px-8 h-20 mx-auto md:mx-0 bg-green-800 rounded-lg flex items-center justify-center mb-5 md:mb-0">
                                <h4 class="font-semibold text-gray-100 text-2xl mb-2">Fitur Utama:</h4>
                                <i data-feather="map" class="text-green-900"></i>
                            </div>
                            <div class="text-center md:text-left xl:text-left">
                                <p class="font-normal text-gray-400 text-xl leading-relaxed">Peta interaktif, database spesies, laporan dan analisis data, serta fitur kolaborasi untuk peneliti dan penggiat konservasi.</p>
                            </div>
                        </div>
        
                        <div class="flex flex-col md:flex-row xl:flex-col justify-center xl:justify-start space-x-4 mb-20">
                            <div class="px-8 h-20 mx-auto md:mx-0 bg-green-800 rounded-lg flex items-center justify-center mb-5 md:mb-0">
                                <h4 class="font-semibold text-gray-100 text-2xl mb-2">Mengapa Satwa Endemik Penting?</h4>
                                <i data-feather="alert-triangle" class="text-green-900"></i>
                            </div>
                            <div class="text-center md:text-left xl:text-left">
                                <p class="font-normal text-gray-400 text-xl leading-relaxed">Satwa endemik memainkan peran penting dalam ekosistem lokal dan keanekaragaman hayati global. Kehilangan spesies endemik dapat menyebabkan kerusakan yang signifikan pada keseimbangan ekosistem.</p>
                            </div>
                        </div>
        
                        <div class="flex flex-col md:flex-row xl:flex-col justify-center xl:justify-start space-x-4 mb-20">
                            <div class="px-8 h-20 mx-auto md:mx-0 bg-green-800 rounded-lg flex items-center justify-center mb-5 md:mb-0">
                                <h4 class="font-semibold text-gray-100 text-2xl mb-2">Ayo Terlibat!</h4>
                                <i data-feather="users" class="text-green-900"></i>
                            </div>
                            <div class="text-center md:text-left xl:text-left">
                                <p class="font-normal text-gray-400 text-xl leading-relaxed">Kami mengajak semua pihak, mulai dari peneliti, mahasiswa, hingga masyarakat umum, untuk terlibat dalam upaya konservasi ini. Anda dapat berkontribusi dengan menyediakan data, menjadi sukarelawan, atau hanya dengan menyebarkan informasi mengenai pentingnya melindungi satwa endemik.</p>
                            </div>
                            <div class="flex">
                                <a href="{{ url('/home') }}" class="inline-block px-6 py-2 bg-blue-600 text-white font-medium text-lg rounded hover:bg-blue-700 transition-colors duration-200">Kembali ke Home</a>
                            </div>
                        </div>
        
                    </div>
        
                </div>
        
            </div> <!-- container.// -->
        
        </section>
        
        <!-- feature section //end -->
        
    </body>
</html>