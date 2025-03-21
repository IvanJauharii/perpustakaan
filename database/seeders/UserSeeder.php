<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        $users = [
            [
                'name' => "admin2",
                'role' => 'admin',
                'email' => 'admin@gmail.com',
                'password' => Hash::make('admin123'),
            ],
            [
                'name' => "petugas2",
                'role' => 'petugas',
                'email' => 'petugas2@gmail.com',
                'password' => Hash::make('petugas123'),
            ],
            [
                'name' => "peminjam",
                'role' => 'peminjam',
                'email' => 'peminjam@gmail.com',
                'password' => Hash::make('peminjam123'),
            ],
            [
                'name' => "adminperpus",
                'role' => 'admin',
                'email' => 'adminperpus@gmail.com',
                'password' => Hash::make('adminperpus123'),
            ],
        ];

        foreach ($users as $user) {
            // Insert atau update data di tabel users
            $userId = DB::table('users')->updateOrInsert(
                ['email' => $user['email']], // Kunci unik (email)
                [
                    'name' => $user['name'],
                    'role' => $user['role'],
                    'password' => $user['password'],
                    'updated_at' => now(),
                ]
            );

            // Pastikan mendapatkan ID user yang dimasukkan
            $userId = DB::table('users')->where('email', $user['email'])->value('id');

            // Jika user adalah admin atau petugas, masukkan ke tabel petugas
            if ($user['role'] === 'admin' || $user['role'] === 'petugas') {
                DB::table('petugas')->updateOrInsert(
                    ['id_user' => $userId], // Kunci unik
                    [
                        'email' => $user['email'],
                        'nama_lengkap' => $user['name'],
                        'role' => $user['role'],
                        'created_at' => now(),
                        'updated_at' => now(),
                    ]
                );
            }
        }
    }
}
