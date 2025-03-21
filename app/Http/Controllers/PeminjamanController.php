<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\User;
use App\Models\Peminjam;
use App\Models\Notifikasi;
use App\Models\Peminjaman;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PeminjamanController extends Controller
{
    public function index()
    {
        $peminjaman = Peminjaman::all();
        return view('petugas.pages.peminjaman.tb-peminjaman', compact('peminjaman'));
    }
    public function ajukan(Request $request)
    {
        // Pastikan user yang sedang login memiliki relasi dengan peminjam
        $peminjam = auth()->user()->peminjam;

        if (!$peminjam) {
            return redirect()->back()->with('error', 'Anda bukan peminjam yang valid.');
        }

        // Validasi input
        $request->validate([
            'id_buku' => 'required|exists:buku,id',
            'jumlah' => 'required|integer|min:1|max:5',
            'tanggal_peminjaman' => 'required|date|after_or_equal:today',
            'tanggal_pengembalian' => 'required|date|after_or_equal:tanggal_peminjaman|before_or_equal:' . now()->addDays(7)->toDateString(),
        ]);

        // Cari buku yang dipilih oleh user
        $buku = Buku::findOrFail($request->id_buku);

        // Buat notifikasi
        Notifikasi::create([
            'id_peminjam' => $peminjam->id,
            'id_buku' => $buku->id,
            'jumlah' => $request->jumlah,
            'tanggal_peminjaman' => $request->tanggal_peminjaman,
            'tanggal_pengembalian' => $request->tanggal_pengembalian,
            'status' => 'pending',
            'pesan' => Auth::user()->name . " ingin meminjam buku \"{$buku->judul}\" sebanyak {$request->jumlah} buku.",
        ]);

        return redirect()->back()->with('peminjaman_success', 'Permintaan peminjaman dikirim, menunggu konfirmasi petugas');
    }
    
    public function konfirmasi($id)
    {
        $notif = Notifikasi::findOrFail($id);
        $petugasName = auth()->user()->name;

        // Kurangi stok buku
        $notif->buku->decrement('jumlah', $notif->jumlah);

        // Simpan ke tabel peminjaman
        Peminjaman::create([
            'id_peminjam' => $notif->id_peminjam,
            'id_petugas' => Auth::id(),
            'id_buku' => $notif->id_buku,
            'tanggal_peminjaman' => $notif->tanggal_peminjaman,
            'tanggal_pengembalian' => $notif->tanggal_pengembalian,
            'status' => 'dipinjam'
        ]);

        $notif->update([
            'status' => 'done',
            'pesan' => "Peminjaman buku \"{$notif->buku->judul}\" telah dikonfirmasi dan diselesaikan oleh petugas {$petugasName}."
        ]);

        return redirect()->back()->with('success', 'Peminjaman dikonfirmasi.');
    }

    public function dikembalikan($id)
    {
        $peminjaman = Peminjaman::findOrFail($id);
        $peminjaman->status = 'dikembalikan';
        $peminjaman->tanggal_dikembalikan = now();
        $peminjaman->save();

        return redirect()->back()->with('success', 'Buku telah dikembalikan.');
    }
    // public function ubahstatus($id) {}
    public function create()
    {
        //
    }
    public function store(Request $request)
    {
        //
    }

    public function show(string $id)
    {
        //
    }

    public function denda() {}

    public function update(Request $request, string $id)
    {
        $peminjaman = Peminjaman::findOrFail($id);
        $notif = Notifikasi::findOrFail($id);

        // Pastikan status hanya bisa diubah jika saat ini "dipinjam"
        if ($request->has('status') && $request->status === 'dikembalikan' && $peminjaman->status == 'dipinjam') {

            $tanggalDikembalikan = now();

            // Update status dan tanggal_dikembalikan di tabel peminjaman
            $peminjaman->update([
                'status' => 'dikembalikan',
                'tanggal_dikembalikan' => $tanggalDikembalikan,
            ]);

            $notif->buku->increment('jumlah', $notif->jumlah);
            // Kirim notifikasi ke peminjam
            Notifikasi::create([
                'id_peminjam' => $peminjaman->id_peminjam,
                'id_buku' => $peminjaman->id_buku,
                'jumlah' => $notif->jumlah,
                'tanggal_peminjaman' => $peminjaman->tanggal_peminjaman,
                'tanggal_pengembalian' => $tanggalDikembalikan,
                'status' => 'done',
                'pesan' => "Buku \"{$peminjaman->buku->judul}\" telah dikembalikan pada {$tanggalDikembalikan->format('d-m-Y')}.",
            ]);

            return redirect()->back()->with('success', 'Status peminjaman diperbarui menjadi dikembalikan.');
        }

        return redirect()->back()->with('error', 'Tidak ada perubahan status.');
    }

    public function destroy(string $id)
    {
        $peminjaman = Peminjaman::find($id);
        if (!$peminjaman) {
            return redirect()->route('peminjaman.index')->with('error', 'Peminjaman tidak ditemukan');
        }
        $peminjaman->delete();
        return redirect()->route('peminjaman.index')->with('success', 'Peminjaman berhasil dihapus');
    }
}
