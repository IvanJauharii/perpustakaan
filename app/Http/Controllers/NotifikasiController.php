<?php

namespace App\Http\Controllers;

use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\Notifikasi;
use App\Models\Peminjaman;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NotifikasiController extends Controller
{
    public function index()
    {
        $notifikasi = Notifikasi::with(['peminjam', 'buku'])
            ->orderByRaw("
            CASE WHEN status = 'pending' THEN 0 ELSE 1 END,
            created_at DESC
            ")
            ->get();

        return view('petugas.pages.notifikasi.index', compact('notifikasi'));
    }


    public function kirimKePeminjam($id)
    {
        $notif = Notifikasi::findOrFail($id);
        $petugasName = Auth::user()->name;

        $notif->update([
            'status' => 'confirmed',
            'pesan' => "Petugas {$petugasName} telah mengonfirmasi permintaan peminjaman buku \"{$notif->buku->judul}\". 
            <a href='" . route('notifikasi.download', $notif->id) . "' class='text-blue-500 underline' target='_blank'>Download Bukti Peminjaman</a>",
            'nama_petugas' => $petugasName
        ]);

        return redirect()->back()->with('success', 'Notifikasi berhasil dikirim ke peminjam beserta bukti.');
    }

    public function downloadBukti($id)
    {
        // $peminjaman = Peminjaman::with('peminjam', 'buku', 'petugas')->findOrFail($id);
        $notifikasi = Notifikasi::with('peminjam', 'buku')->findOrFail($id);
        $pdf = PDF::loadView('peminjam.pages.bukti_peminjaman', [
            'notifikasi' => $notifikasi
        ]);

        return $pdf->download('bukti-peminjaman.pdf');
    }

    public function hapus($id)
    {
        Notifikasi::findOrFail($id)->delete();
        return redirect()->back()->with('success', 'Notifikasi dihapus.');
    }
}
