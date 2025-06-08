<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message;

class MessageController extends Controller
{
    public function create()
    {
        $bidangOptions = [
            'Kepala Sekolah',
            'Wakil Kepala Sekolah',
            'Kurikulum',
            'Kesiswaan',
            'Sarana Prasarana',
            'Humas',
            'Perpustakaan',
            'Laboratorium',
            'BK (Bimbingan Konseling)',
            'Tata Usaha',
        ];

        $jurusanOptions = [
            'Layanan Perbankan (LP)',
            'Rekayasa Perangkat Lunak (RPL)',
            'Akuntansi (AKL)',
            'Manajemen Perkantoran (MP)',
            'Bisnis Digital (BD)',
        ];

        return view('message.create', compact('bidangOptions', 'jurusanOptions'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'kelas' => 'required|string|max:10',
            'jurusan' => 'required|string',
            'tujuan' => 'required|string',
            'pesan' => 'required|string|min:10',
            'nama' => 'nullable|string|max:100',
        ]);

        Message::create([
            'nama' => $request->nama,
            'email' => $request->email,
            'kelas' => $request->kelas,
            'jurusan' => $request->jurusan,
            'tujuan' => $request->tujuan,
            'pesan' => $request->pesan,
            'status' => 'pending',
        ]);

        return redirect()->route('home')->with('success', 'Pesan berhasil dikirim!');
    }
}
