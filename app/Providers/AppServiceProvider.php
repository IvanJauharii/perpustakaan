<?php

namespace App\Providers;

use App\Models\Buku;
use App\Models\Notifikasi;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        View::composer('*', function ($view) {
            $view->with('buku', Buku::with('relasi_kategori')->paginate(5));
        });

        View::composer('components.navbar', function ($view) {
            $notifikasi = [];
            $jumlahNotifikasi = 0;

            if (Auth::check()) {
                $peminjam = \App\Models\Peminjam::where('id_user', Auth::id())->first();

                if ($peminjam) {

                    $notifikasi = Notifikasi::where('id_peminjam', $peminjam->id)
                        ->where(function ($query) {
                            $query->where('pesan', 'like', 'Petugas%')
                                ->orWhere('pesan', 'like', 'Buku%');
                        })
                        ->orderBy('created_at', 'desc')
                        ->get();
                    $jumlahNotifikasi = $notifikasi->count();
                }
            }

            $view->with([
                'notifikasi' => $notifikasi,
                'jumlahNotifikasi' => $jumlahNotifikasi,
            ]);
        });
    }
}
