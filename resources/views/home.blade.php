@extends('layouts.app')

@section('title', 'ASIX - Platform Komunikasi Sekolah')

@section('content')
<!-- Hero Section -->
<section class="pt-24 pb-16 px-4 sm:px-6 lg:px-8 bg-gradient-to-br from-red-50 to-amber-50">
    <div class="max-w-7xl mx-auto text-center">
        <h1 class="text-4xl md:text-6xl font-bold text-gray-900 mb-6">
            Selamat Datang di <span class="bg-gradient-to-r from-red-600 to-amber-500 bg-clip-text text-transparent">ASIX</span>
        </h1>
        <p class="text-xl text-gray-600 mb-8 max-w-3xl mx-auto">
            ASIX adalah kepanjangan dari Aspirasi Siswa Smexa yang dimana memungkinkan kita untuk menghubungkan siswa dengan berbagai bidang di sekolah. Sampaikan pesan,
            saran, atau keluhan Anda dengan mudah,aman dan privasi terjaga.
        </p>
        <a href="{{ route('message.create') }}" class="inline-flex items-center bg-gradient-to-r from-red-600 to-amber-500 text-white px-8 py-3 rounded-md text-lg font-medium hover:from-red-700 hover:to-amber-600 transition-all duration-200 shadow-lg hover:shadow-xl transform hover:-translate-y-1">
            Mulai Kirim Pesan
            <svg class="ml-2 h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
            </svg>
        </a>
    </div>
</section>

<!-- Features Section -->
<section class="py-16 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <h2 class="text-3xl font-bold text-gray-900 mb-4">Mengapa Memilih <span class="text-red-600">ASIX</span>?</h2>
            <p class="text-lg text-gray-600">
                Platform yang dirancang khusus untuk komunikasi yang efektif di lingkungan sekolah
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <div class="bg-white p-6 rounded-lg shadow-lg border-t-4 border-red-500 hover:shadow-xl transition-shadow">
                <div class="h-12 w-12 text-red-600 mb-4">
                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path>
                    </svg>
                </div>
                <h3 class="text-xl font-semibold mb-2 text-gray-900">Komunikasi Mudah</h3>
                <p class="text-gray-600">Kirim pesan langsung ke bidang yang tepat tanpa ribet</p>
            </div>

            <div class="bg-white p-6 rounded-lg shadow-lg border-t-4 border-amber-500 hover:shadow-xl transition-shadow">
                <div class="h-12 w-12 text-amber-500 mb-4">
                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                    </svg>
                </div>
                <h3 class="text-xl font-semibold mb-2 text-gray-900">Anonim & Aman</h3>
                <p class="text-gray-600">Identitas Anda terlindungi, hanya email yang diperlukan untuk konfirmasi</p>
            </div>

            <div class="bg-white p-6 rounded-lg shadow-lg border-t-4 border-red-400 hover:shadow-xl transition-shadow">
                <div class="h-12 w-12 text-red-400 mb-4">
                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                    </svg>
                </div>
                <h3 class="text-xl font-semibold mb-2 text-gray-900">Terhubung ke Semua Bidang</h3>
                <p class="text-gray-600">Akses langsung ke berbagai bidang sekolah sesuai kebutuhan Anda</p>
            </div>
        </div>
    </div>
</section>

<!-- How to Use Section -->
<section class="py-16 bg-gradient-to-br from-red-50 to-amber-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <h2 class="text-3xl font-bold text-gray-900 mb-4">Cara Menggunakan <span class="text-red-600">ASIX</span></h2>
            <p class="text-lg text-gray-600">Ikuti langkah sederhana berikut untuk mengirim pesan Anda</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
            <div class="bg-white p-6 rounded-lg shadow-lg hover:shadow-xl transition-shadow">
                <div class="w-12 h-12 bg-gradient-to-r from-red-600 to-red-500 text-white rounded-full flex items-center justify-center text-xl font-bold mb-4">
                    1
                </div>
                <h3 class="text-xl font-semibold mb-2 text-gray-900">Isi Form</h3>
                <p class="text-gray-600">Lengkapi form dengan email, kelas, jurusan, dan pilih tujuan bidang</p>
            </div>

            <div class="bg-white p-6 rounded-lg shadow-lg hover:shadow-xl transition-shadow">
                <div class="w-12 h-12 bg-gradient-to-r from-amber-500 to-amber-400 text-white rounded-full flex items-center justify-center text-xl font-bold mb-4">
                    2
                </div>
                <h3 class="text-xl font-semibold mb-2 text-gray-900">Tulis Pesan</h3>
                <p class="text-gray-600">Sampaikan pesan, saran, atau keluhan Anda dengan jelas</p>
            </div>

            <div class="bg-white p-6 rounded-lg shadow-lg hover:shadow-xl transition-shadow">
                <div class="w-12 h-12 bg-gradient-to-r from-red-500 to-amber-500 text-white rounded-full flex items-center justify-center text-xl font-bold mb-4">
                    3
                </div>
                <h3 class="text-xl font-semibold mb-2 text-gray-900">Kirim</h3>
                <p class="text-gray-600">Klik tombol kirim dan pesan akan diteruskan ke bidang yang tepat</p>
            </div>

            <div class="bg-white p-6 rounded-lg shadow-lg hover:shadow-xl transition-shadow">
                <div class="w-12 h-12 bg-gradient-to-r from-amber-600 to-red-500 text-white rounded-full flex items-center justify-center text-xl font-bold mb-4">
                    4
                </div>
                <h3 class="text-xl font-semibold mb-2 text-gray-900">Konfirmasi</h3>
                <p class="text-gray-600">Dapatkan konfirmasi lanjutan dari e-mail anda jadi pastikan e-mailnya aktif ya ^-^</p>
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="py-16 bg-gradient-to-r from-red-600 to-amber-500">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h2 class="text-3xl font-bold text-white mb-4">Siap Menyampaikan Pesan Anda?</h2>
        <p class="text-xl text-red-100 mb-8">Mulai berkomunikasi dengan bidang sekolah sekarang juga</p>
        <a href="{{ route('message.create') }}" class="inline-block bg-white text-red-600 px-8 py-3 rounded-md text-lg font-medium hover:bg-gray-100 transition-colors shadow-lg hover:shadow-xl transform hover:-translate-y-1">
            Kirim Pesan Sekarang
        </a>
    </div>
</section>
@endsection
