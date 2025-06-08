<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'ASIX - Platform Komunikasi Sekolah')</title>
    <meta name="description" content="Platform komunikasi anonim untuk siswa dan bidang sekolah">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="/src/styles.css" rel="stylesheet">
    <link rel="shorcut icon" href="{{ asset('storage/iconsmexa.png') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>



</head>

<body class="bg-white scroll-smooth">
    <!-- Navbar -->
    <nav class="fixed top-0 left-0 right-0 z-50 bg-white/80 backdrop-blur-md border-b border-red-200/20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-16">
                <!-- Logo -->
                <div class="flex items-center space-x-2">
                    <a href="{{ route('home') }}" class="flex items-center space-x-2 text-2xl font-bold text-red-600">
                        <img src="{{ asset('storage/iconsmexa.png') }}" alt="Logo" class="h-12">
                        <span>ASIX</span>
                    </a>
                </div>

                <!-- Desktop Navigation -->
                <div class="hidden md:flex items-center space-x-8">
                    <a href="{{ route('home') }}" class="text-gray-700 hover:text-red-600 transition-colors">
                        Beranda
                    </a>
                    <a href="#about" class="text-gray-700 hover:text-red-600 transition-colors">
                        About
                    </a>
                    <a href="{{ route('message.create') }}"
                        class="bg-gradient-to-r from-red-600 to-amber-500 text-white px-4 py-2 rounded-md hover:from-red-700 hover:to-amber-600 transition-all duration-200 shadow-md">
                        Mulai Kirim
                    </a>
                </div>

                <!-- Mobile menu button -->
                <div class="md:hidden">
                    <button id="mobile-menu-button" class="text-gray-700 hover:text-red-600">
                        <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 6h16M4 12h16M4 18h16"></path>
                        </svg>
                    </button>
                </div>
            </div>

            <!-- Mobile Navigation -->
            <div id="mobile-menu" class="hidden md:hidden">
                <div class="px-2 pt-2 pb-3 space-y-1 bg-white/90 backdrop-blur-md rounded-lg mt-2">
                    <a href="{{ route('home') }}" class="block px-3 py-2 text-gray-700 hover:text-red-600">
                        Beranda
                    </a>
                    <a href="{{ route('message.create') }}" class="block px-3 py-2 text-gray-700 hover:text-red-600">
                        Kirim Pesan
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
    <footer id="about" class="bg-gradient-to-r from-red-900 to-red-800 text-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                <!-- Brand -->
                <div class="col-span-1 md:col-span-2">
                    <h3 class="text-2xl font-bold mb-4 text-amber-300">ASIX</h3>
                    <p class="text-red-100 mb-4">
                        Platform komunikasi anonim untuk siswa dan bidang sekolah. Sampaikan pesan Anda dengan aman dan
                        mudah.
                    </p>
                </div>

                <!-- Quick Links -->
                <div>
                    <h4 class="text-lg font-semibold mb-4 text-amber-300">Menu</h4>
                    <ul class="space-y-2">
                        <li>
                            <a href="{{ route('home') }}" class="text-red-200 hover:text-amber-300 transition-colors">
                                Beranda
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('message.create') }}"
                                class="text-red-200 hover:text-amber-300 transition-colors">
                                Kirim Pesan
                            </a>
                        </li>
                    </ul>
                </div>

                <!-- Contact -->
                <div>
                    <h4 class="text-lg font-semibold mb-4 text-amber-300">Kontak</h4>
                    <ul class="space-y-2 text-red-200">
                        <li>Email:smkn1probolinggo@yahoo.id</li>
                        <li>Telepon:(0335) 421121</li>
                    </ul>
                </div>
            </div>

            <div class="border-t border-red-700 mt-8 pt-8 text-center text-red-200">
                <p>&copy; {{ date('Y') }} ASIX. Semua hak dilindungi.</p>
            </div>
        </div>
    </footer>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    <script>
        // Mobile menu toggle
        document.getElementById('mobile-menu-button').addEventListener('click', function() {
            const menu = document.getElementById('mobile-menu');
            menu.classList.toggle('hidden');
        });
    </script>
    {{-- toastr --}}
    <script>
        @if (session('success'))
            toastr.success("{{ session('success') }}");
        @endif

        @if (session('error'))
            toastr.error("{{ session('error') }}");
        @endif

        @if (session('info'))
            toastr.info("{{ session('info') }}");
        @endif

        @if (session('warning'))
            toastr.warning("{{ session('warning') }}");
        @endif
    </script>

    {{-- sweatalert2-logout --}}
    <script>
        document.getElementById('btnLogout').addEventListener('click', function(e) {
            e.preventDefault();

            Swal.fire({
                title: 'Yakin ingin logout?',
                text: "Kamu akan keluar dari akun.",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, logout',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('logoutForm').submit();
                }
            })
        });
    </script>

    {{-- sweatalert2-confirm --}}
    <script>
        document.getElementById('btnSend').addEventListener('click', function(e) {
            e.preventDefault();

            Swal.fire({
                title: 'Yakin ingin Kirim?',
                text: "Data yang kamu kirim akan terkirim ke bidang jurusan.",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, Kirim',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('sendForm').submit();
                }
            })
        });
    </script>

</body>

</html>
