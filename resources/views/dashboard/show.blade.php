@extends('layouts.dashboard')

@section('title', 'Detail Pesan - ASIX')

@section('content')
<div class="space-y-6">
    <!-- Back Button -->
    <div>
        <a href="{{ route('dashboard') }}" class="inline-flex items-center text-blue-600 hover:text-blue-800">
            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
            </svg>
            Kembali ke Dashboard
        </a>
    </div>

    <!-- Message Details -->
    <div class="bg-white shadow rounded-lg">
        <div class="px-6 py-4 border-b border-gray-200">
            <div class="flex items-center justify-between">
                <h1 class="text-xl font-semibold text-gray-900">Detail Pesan</h1>
                @if($message->status === 'pending')
                    <span class="inline-flex px-3 py-1 text-sm font-semibold rounded-full bg-yellow-100 text-yellow-800">
                        Menunggu
                    </span>
                @elseif($message->status === 'read')
                    <span class="inline-flex px-3 py-1 text-sm font-semibold rounded-full bg-blue-100 text-blue-800">
                        Dibaca
                    </span>
                @else
                    <span class="inline-flex px-3 py-1 text-sm font-semibold rounded-full bg-green-100 text-green-800">
                        Dibalas
                    </span>
                @endif
            </div>
        </div>

        <div class="p-6 space-y-6">
            <!-- Sender Info -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <h3 class="text-sm font-medium text-gray-500 mb-2">Informasi Pengirim</h3>
                    <div class="space-y-2">
                        <p><span class="font-medium">Nama:</span> {{ $message->nama ?: 'Anonim' }}</p>
                        <p><span class="font-medium">Email:</span> {{ $message->email }}</p>
                        <p><span class="font-medium">Kelas:</span> {{ $message->kelas }}</p>
                        <p><span class="font-medium">Jurusan:</span> {{ $message->jurusan }}</p>
                    </div>
                </div>

                <div>
                    <h3 class="text-sm font-medium text-gray-500 mb-2">Informasi Pesan</h3>
                    <div class="space-y-2">
                        <p><span class="font-medium">Tujuan:</span> {{ $message->tujuan }}</p>
                        <p><span class="font-medium">Tanggal:</span> {{ $message->created_at->format('d F Y, H:i') }}</p>
                        @if($message->replied_at)
                            <p><span class="font-medium">Dibalas:</span> {{ $message->replied_at->format('d F Y, H:i') }}</p>
                            <p><span class="font-medium">Dibalas oleh:</span> {{ $message->repliedBy->name }}</p>
                        @endif
                    </div>
                </div>
            </div>

            <!-- Message Content -->
            <div>
                <h3 class="text-sm font-medium text-gray-500 mb-2">Isi Pesan</h3>
                <div class="bg-gray-50 p-4 rounded-lg">
                    <p class="text-gray-900 whitespace-pre-wrap">{{ $message->pesan }}</p>
                </div>
            </div>

            <!-- Reply Section -->
            @if($message->reply_message)
                <div>
                    <h3 class="text-sm font-medium text-gray-500 mb-2">Balasan</h3>
                    <div class="bg-blue-50 p-4 rounded-lg border-l-4 border-blue-400">
                        <p class="text-gray-900 whitespace-pre-wrap">{{ $message->reply_message }}</p>
                        <p class="text-sm text-gray-600 mt-2">
                            Dibalas oleh {{ $message->repliedBy->name }} pada {{ $message->replied_at->format('d F Y, H:i') }}
                        </p>
                    </div>
                </div>
            @else
                <!-- Reply Form -->
                <div>
                    <h3 class="text-sm font-medium text-gray-500 mb-2">Balas Pesan</h3>
                    <form action="{{ route('dashboard.reply', $message) }}" method="POST" class="space-y-4">
                        @csrf
                        <div>
                            <textarea name="reply_message" rows="4" required
                                      class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                      placeholder="Tulis balasan Anda di sini...">{{ old('reply_message') }}</textarea>
                            @error('reply_message')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="flex justify-end">
                            <button type="submit"
                                    class="bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                                Kirim Balasan
                            </button>
                        </div>
                    </form>
                </div>
            @endif
        </div>
    </div>
</div>
@endsection
