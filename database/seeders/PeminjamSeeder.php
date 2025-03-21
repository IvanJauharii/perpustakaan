<?php

namespace Database\Seeders;

use App\Models\Peminjam;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

class PeminjamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Ambil data provinsi dari API
        // $response = Http::get('https://www.emsifa.com/api-wilayah-indonesia/api/provinces.json');
        // $response = Http::withOptions(['verify' => false])
        //     ->get('https://www.emsifa.com/api-wilayah-indonesia/api/provinces.json');
        // $provinces = $response->json();

        // if (!$provinces) {
        //     return;
        // }

        // Ambil satu provinsi secara acak
        // $province = $provinces[array_rand($provinces)];

        // Ambil data kota berdasarkan ID provinsi
        // $response = Http::get("https://www.emsifa.com/api-wilayah-indonesia/api/regencies/{$province['id']}.json");
        // dd($response->json());
        // $regencies = $response->json();
        // $regency = $regencies ? $regencies[array_rand($regencies)] : null;

        // Ambil data kecamatan berdasarkan ID kota/kabupaten
        // $response = Http::get("https://www.emsifa.com/api-wilayah-indonesia/api/districts/{$regency['id']}.json");
        // $districts = $response->json();
        // $district = $districts ? $districts[array_rand($districts)] : null;


        // menambah data peminjam dari kolom role dengan role peminjam dari tabel users
        // $peminjamEmails = DB::table('users')->where('role', 'peminjam')->pluck('email')->toArray();
        // foreach ($peminjamEmails as $email) {
        //     $id_user = DB::table('users')->where('email', $email)->value('id');
        //     dump($email, $id_user);
        //     $peminjamIds[] = DB::table('peminjam')->insertGetId([
        //         'id_user' => $id_user,
        //         'email' => $email,
        //         'nama_lengkap' => 'peminjambaik',
        //         'phone' => '089122224444',
        //         'alamat' => 'Salam',
        //         'location' => "{$district['PANDAK']}, {$regency['KABUPATEN BANTUL']}, {$province['DI YOGYAKARTA']}",
        //         'poto' => 'https://api.dicebear.com/9.x/big-smile/svg',
        //         'created_at' => now(),
        //         'updated_at' => now()
        //     ]);
        // }

        $users = User::where('role', 'peminjam')->get();
        foreach ($users as $user) {
            Peminjam::updateOrCreate(
                ['id_user' => $user->id],
                [
                    'email' => $user->email,
                    'nama_lengkap' => $user->name,
                    'created_at' => now(),
                    'updated_at' => now()
                ]
            );
        }
    }
}
