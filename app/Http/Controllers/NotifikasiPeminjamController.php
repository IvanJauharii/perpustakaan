<?php

namespace App\Http\Controllers;

use App\Models\Notifikasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NotifikasiPeminjamController extends Controller
{
    // public function index()
    // {
    //     $peminjam = Auth::user()->peminjam;
    //     if (!$peminjam) {
    //         return redirect()->back()->with('error', 'Anda bukan peminjam');
    //     }
    //     $notifikasi = Notifikasi::where('id_peminjam', $peminjam->id)
    //         ->orderBy('created_at', 'desc')
    //         ->get();
    //     $jumlahNotifikasi = $notifikasi->count();

    //     return view('landing', compact('notifikasi', 'jumlahNotifikasi'));
    // }
}
