@extends('layouts.app')

@section('title', 'Kirim Pesan - ASIX')

@section('content')
<div class="min-h-screen pt-24 pb-16 px-4 sm:px-6 lg:px-8">
    <div class="max-w-2xl mx-auto">
        <div class="text-center mb-8">
            <h1 class="text-3xl font-bold text-gray-900 mb-4">Kirim Pesan</h1>
            <p class="text-lg text-gray-600">Sampaikan pesan, saran, atau keluhan Anda kepada bidang yang tepat</p>
        </div>

        @if(session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-6">
                <div class="flex items-center">
                    <svg class="h-6 w-6 text-green-600 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    {{ session('success') }}
                </div>
            </div>
        @endif

        <div class="bg-white shadow-md rounded-lg">
            <div class="px-6 py-4 border-b border-gray-200">
                <h2 class="text-xl font-semibold">Form Pengiriman Pesan</h2>
                <p class="text-gray-600 mt-1">Isi form di bawah ini untuk mengirim pesan Anda. Nama bersifat opsional.</p>
            </div>

            <div class="p-6">
                <form action="{{ route('message.store') }}" method="POST" class="space-y-6">
                    @csrf

                    <!-- Nama (Opsional) -->
                    <div>
                        <label for="nama" class="block text-sm font-medium text-gray-700 mb-2">Nama (Opsional)</label>
                        <input type="text" id="nama" name="nama" value="{{ old('nama') }}"
                               class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                               placeholder="Masukkan nama Anda">
                        @error('nama')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Email (Wajib) -->
                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700 mb-2">Email *</label>
                        <input type="email" id="email" name="email" value="{{ old('email') }}" required
                               class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                               placeholder="contoh@email.com">
                        @error('email')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Kelas (Wajib) -->
                    <div>
                        <label for="kelas" class="block text-sm font-medium text-gray-700 mb-2">Kelas *</label>
                        <input type="text" id="kelas" name="kelas" value="{{ old('kelas') }}" required
                               class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                               placeholder="Contoh: XII-1">
                        @error('kelas')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Jurusan (Wajib) -->
                    <div>
                        <label for="jurusan" class="block text-sm font-medium text-gray-700 mb-2">Jurusan *</label>
                        <select id="jurusan" name="jurusan" required
                                class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                            <option value="">Pilih jurusan Anda</option>
                            @foreach($jurusanOptions as $jurusan)
                                <option value="{{ $jurusan }}" {{ old('jurusan') == $jurusan ? 'selected' : '' }}>
                                    {{ $jurusan }}
                                </option>
                            @endforeach
                        </select>
                        @error('jurusan')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Tujuan (Wajib) -->
                    <div>
                        <label for="tujuan" class="block text-sm font-medium text-gray-700 mb-2">Tujuan Bidang *</label>
                        <select id="tujuan" name="tujuan" required
                                class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                            <option value="">Pilih bidang tujuan</option>
                            @foreach($bidangOptions as $bidang)
                                <option value="{{ $bidang }}" {{ old('tujuan') == $bidang ? 'selected' : '' }}>
                                    {{ $bidang }}
                                </option>
                            @endforeach
                        </select>
                        @error('tujuan')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Pesan (Wajib) -->
                    <div>
                        <label for="pesan" class="block text-sm font-medium text-gray-700 mb-2">Pesan *</label>
                        <textarea id="pesan" name="pesan" rows="6" required
                                  class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                  placeholder="Tulis pesan, saran, atau keluhan Anda di sini...">{{ old('pesan') }}</textarea>
                        @error('pesan')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="bg-blue-50 border border-blue-200 rounded-md p-4">
                        <p class="text-blue-800 text-sm">
                            Pesan Anda akan dikirim secara anonim. Hanya email yang akan digunakan untuk konfirmasi pengiriman.
                        </p>
                    </div>

                    <button type="submit"
                            class="w-full bg-blue-600 text-white py-3 px-4 rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition-colors flex items-center justify-center">
                        <svg class="h-5 w-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"></path>
                        </svg>
                        Kirim Pesan
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
