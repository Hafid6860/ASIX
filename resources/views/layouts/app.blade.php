<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'ASIX - Platform Komunikasi Sekolah')</title>
    <meta name="description" content="Platform komunikasi anonim untuk siswa dan bidang sekolah">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="/src/styles.css" rel="stylesheet">
    <link rel="shorcut icon" href="https://smkn1probolinggo.sch.id/wp-content/uploads/2023/11/LOGO-SMKN-1-PROBOLINGGO.gif" >


</head>
<body class="bg-white">
    <!-- Navbar -->
    <nav class="fixed top-0 left-0 right-0 z-50 bg-white/80 backdrop-blur-md border-b border-gray-200/20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-16">
                <!-- Logo -->
                <a href="{{ route('home') }}" class="text-2xl font-bold text-gray-900">
                    ASIX
                </a>

                <!-- Desktop Navigation -->
                <div class="hidden md:flex items-center space-x-8">
                    <a href="{{ route('home') }}" class="text-gray-700 hover:text-gray-900 transition-colors">
                        Beranda
                    </a>
                    <a href="{{ route('message.create') }}" class="text-gray-700 hover:text-gray-900 transition-colors">
                        Kirim Pesan
                    </a>
                    <a href="{{ route('login') }}" class="bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700 transition-colors">
                        Login Sebagai Guru
                    </a>
                </div>

                <!-- Mobile menu button -->
                <div class="md:hidden">
                    <button id="mobile-menu-button" class="text-gray-700 hover:text-gray-900">
                        <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                        </svg>
                    </button>
                </div>
            </div>

            <!-- Mobile Navigation -->
            <div id="mobile-menu" class="hidden md:hidden">
                <div class="px-2 pt-2 pb-3 space-y-1 bg-white/90 backdrop-blur-md rounded-lg mt-2">
                    <a href="{{ route('home') }}" class="block px-3 py-2 text-gray-700 hover:text-gray-900">
                        Beranda
                    </a>
                    <a href="{{ route('message.create') }}" class="block px-3 py-2 text-gray-700 hover:text-gray-900">
                        Kirim Pesan
                    </a>
                    <a href="{{ route('login') }}" class="block px-3 py-2 text-gray-700 hover:text-gray-900">
                        Login Sebagai Guru
                    </a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main>
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-gray-900 text-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                <!-- Brand -->
                <div class="col-span-1 md:col-span-2">
                    <h3 class="text-2xl font-bold mb-4">ASIX</h3>
                    <p class="text-gray-400 mb-4">
                        Platform komunikasi anonim untuk siswa dan bidang sekolah. Sampaikan pesan Anda dengan aman dan mudah.
                    </p>
                </div>

                <!-- Quick Links -->
                <div>
                    <h4 class="text-lg font-semibold mb-4">Menu</h4>
                    <ul class="space-y-2">
                        <li>
                            <a href="{{ route('home') }}" class="text-gray-400 hover:text-white transition-colors">
                                Beranda
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('message.create') }}" class="text-gray-400 hover:text-white transition-colors">
                                Kirim Pesan
                            </a>
                        </li>
                    </ul>
                </div>

                <!-- Contact -->
                <div>
                    <h4 class="text-lg font-semibold mb-4">Kontak</h4>
                    <ul class="space-y-2 text-gray-400">
                        <li>Email:smkn1_probolinggo@yahoo.co.id</li>
                        <li>Telepon:(0335) 421121</li>
                    </ul>
                </div>
            </div>

            <div class="border-t border-gray-800 mt-8 pt-8 text-center text-gray-400">
                <p>&copy; {{ date('Y') }} ASIX. Semua hak dilindungi.</p>
            </div>
        </div>
    </footer>

    <script>
        // Mobile menu toggle
        document.getElementById('mobile-menu-button').addEventListener('click', function() {
            const menu = document.getElementById('mobile-menu');
            menu.classList.toggle('hidden');
        });
    </script>
</body>
</html>
