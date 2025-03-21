<?php

namespace App\Listeners;

use App\Models\Peminjam;
use Illuminate\Auth\Events\Registered;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\DB;

class AssignPeminjamRole
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(Registered $event): void
    {
        $user = $event->user;

        // Pastikan hanya user dengan role "peminjam" yang dimasukkan ke tabel peminjam
        // if ($user->role === 'peminjam') {
        //     DB::table('peminjam')->insert([
        //         'id_user' => $user->id,
        //         'email' => $user->email,
        //         'nama_lengkap' => $user->name,
        //         'phone' => null,
        //         'alamat' => null,
        //         'location' => null,
        //         'poto'=> default,
        //         'created_at' => now(),
        //         'updated_at' => now(),
        //     ]);
        if ($user->role === 'peminjam') {
            Peminjam::create([
                'id_user' => $user->id,
                'email' => $user->email,
                'nama_lengkap' => $user->name,
                'phone' => null,
                'alamat' => null,
                'location' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
