<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - ASIX</title>
    @vite(['resources/css/app.css'])
    <link rel="shorcut icon" href="{{ asset('storage/iconsmexa.png') }}">

</head>

<body class="bg-gradient-to-br from-red-50 to-amber-50">
    <div class="min-h-screen flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-md w-full space-y-8">
            <div class="text-center">
                <h2
                    class="mt-6 text-3xl font-extrabold bg-gradient-to-r from-red-600 to-amber-500 bg-clip-text text-transparent">
                    Login ke ASIX
                </h2>
                <p class="mt-2 text-sm text-gray-600">
                    Masuk sebagai admin bidang untuk melihat pesan
                </p>
            </div>

            <div class="bg-white shadow-xl rounded-lg border-t-4 border-gradient-to-r from-red-500 to-amber-500">
                <form class="p-8 space-y-6" action="{{ route('login') }}" method="POST">
                    @csrf
                    <div class="space-y-4">
                        <div>
                            <label for="email" class="block text-sm font-medium text-gray-700 mb-2">Email</label>
                            <input id="email" name="email" type="email" required
                                class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-red-500 transition-colors"
                                placeholder="Email address" value="{{ old('email') }}">
                        </div>
                        <div>
                            <label for="password" class="block text-sm font-medium text-gray-700 mb-2">Password</label>
                            <input id="password" name="password" type="password" required
                                class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-red-500 transition-colors"
                                placeholder="Password">
                        </div>
                    </div>

                    @if ($errors->any())
                        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded">
                            @foreach ($errors->all() as $error)
                                <p class="text-sm">{{ $error }}</p>
                            @endforeach
                        </div>
                    @endif

                    <div class="flex items-center justify-between">
                        <div class="flex items-center">
                            <input id="remember" name="remember" type="checkbox"
                                class="h-4 w-4 text-red-600 focus:ring-red-500 border-gray-300 rounded">
                            <label for="remember" class="ml-2 block text-sm text-gray-900">
                                Ingat saya
                            </label>
                        </div>
                    </div>

                    <div>
                        <button type="submit"
                            class="w-full bg-gradient-to-r from-red-600 to-amber-500 text-white py-2 px-4 rounded-md hover:from-red-700 hover:to-amber-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 transition-all duration-200 shadow-lg hover:shadow-xl transform hover:-translate-y-1">
                            Masuk
                        </button>
                    </div>

                    <div class="text-center">
                        <a href="{{ route('home') }}" class="text-red-600 hover:text-amber-500 transition-colors">
                            ← Kembali ke Beranda
                        </a>
                    </div>
                </form>
            </div>

            <!-- Info akun default -->
            {{-- <div class="bg-white border border-amber-200 rounded-lg p-4 shadow-md">
                <h3 class="text-sm font-medium text-red-800 mb-2">Akun Default:</h3>
                <div class="text-xs text-gray-700 space-y-1">
                    <p><strong class="text-red-600">Admin:</strong> admin@asix.sch.id</p>
                    <p><strong class="text-red-600">BK:</strong> bkbimbingankonseling@asix.sch.id</p>
                    <p><strong class="text-red-600">Kesiswaan:</strong> kesiswaan@asix.sch.id</p>
                    <p><strong class="text-amber-600">Password semua akun:</strong> password123</p>
                </div>
            </div> --}}
        </div>
    </div>
</body>

</html>
