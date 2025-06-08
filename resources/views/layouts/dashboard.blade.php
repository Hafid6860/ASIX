<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Dashboard - ASIX')</title>
    @vite(['resources/css/app.css'])
    <link rel="shorcut icon" href="{{ asset('storage/iconsmexa.png') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</head>

<body class="bg-gradient-to-br from-red-50 to-amber-50">
    <!-- Navigation -->
    <nav class="bg-white shadow-lg border-b-4 border-gradient-to-r from-red-500 to-amber-500">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <div class="flex items-center">
                    <a href="{{ route('dashboard') }}" class="flex items-center space-x-2 text-2xl font-bold text-red-600">
                        <img src="{{ asset('storage/iconsmexa.png') }}" alt="Logo" class="h-12">
                        <span>ASIX Dashboard</span>
                    </a>
                </div>

                <div class="flex items-center space-x-4">
                    <span class="text-sm text-gray-700">{{ Auth::user()->name }}</span>
                    <span class="text-xs text-white bg-gradient-to-r from-red-500 to-amber-500 px-3 py-1 rounded-full shadow-md">{{ Auth::user()->bidang }}</span>
                    <form id="logoutForm" action="{{ route('logout') }}" method="POST" class="inline">
                        @csrf
                        <button id="btnLogout" type="button" class="text-sm text-red-600 hover:text-red-800 transition-colors">
                            Logout
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
        {{-- @if(session('success'))
            <div class="mb-6 bg-gradient-to-r from-green-100 to-green-50 border border-green-400 text-green-700 px-4 py-3 rounded-lg shadow-md">
                <div class="flex items-center">
                    <svg class="h-5 w-5 text-green-600 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    {{ session('success') }}
                </div>
            </div>
        @endif

        @if(session('error'))
            <div class="mb-6 bg-gradient-to-r from-red-100 to-red-50 border border-red-400 text-red-700 px-4 py-3 rounded-lg shadow-md">
                <div class="flex items-center">
                    <svg class="h-5 w-5 text-red-600 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    {{ session('error') }}
                </div>
            </div>
        @endif --}}

        @yield('content')
    </main>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
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

    {{-- sweatalert-logout --}}
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

</body>

</html>
