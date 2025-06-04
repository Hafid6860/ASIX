<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        $bidangList = [
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

        // Buat admin utama
        User::create([
            'name' => 'Administrator',
            'email' => 'admin@asix.sch.id',
            'password' => Hash::make('password123'),
            'bidang' => 'Admin',
            'role' => 'admin',
        ]);

        // Buat akun untuk setiap bidang
        foreach ($bidangList as $bidang) {
            $email = strtolower(str_replace([' ', '(', ')'], ['', '', ''], $bidang)) . '@asix.sch.id';

            User::create([
                'name' => 'Admin ' . $bidang,
                'email' => $email,
                'password' => Hash::make('password123'),
                'bidang' => $bidang,
                'role' => 'bidang',
            ]);
        }
    }
}
