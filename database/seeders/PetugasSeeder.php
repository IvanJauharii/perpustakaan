<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PetugasSeeder extends Seeder
{
    public function run(): void
    {
        // menambah data petugas dari kolom role dengan role petugas dari tabel users
        $petugasEmails = DB::table('users')->where('role', 'petugas')->pluck('email')->toArray();
        foreach ($petugasEmails as $email) {
            $id_user = DB::table('users')->where('email', $email)->value('id');
            $petugasIds[] = DB::table('petugas')->insertGetId([
                'id_user' => $id_user,
                'email' => $email,
                'nama_lengkap' => 'adminbaik',
                'phone' => '089122223333',
                'alamat' => 'Wijirejo, Pandak, Bantul, Yogyakarta',
                'poto' => 'https://api.dicebear.com/9.x/lorelei/svg',
                'role' => 'admin',
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }
    }
}
