<?php

namespace App\Http\Controllers;

use App\Models\KoleksiBuku;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KoleksiController extends Controller
{
    // Menampilkan semua koleksi milik peminjam yang login
    public function index()
    {
        $peminjam = Auth::user()->peminjam;
        if (!$peminjam) {
            return redirect()->route('login')->with('error', 'Harap login sebagai peminjam!');
        }

        $koleksis = KoleksiBuku::with('buku')->where('id_peminjam', $peminjam->id)->get();

        return view('peminjam.pages.koleksi', compact('koleksis'));
    }

    // Menyimpan koleksi baru
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
        ]);

        $peminjam = Auth::user()->peminjam;
        if (!$peminjam) {
            return redirect()->route('login')->with('error', 'Harap login sebagai peminjam!');
        }

        $peminjam->koleksi()->create([
            'nama' => $request->nama,
        ]);

        return back()->with('success', 'Koleksi berhasil dibuat.');
    }

    // Menambahkan buku ke dalam koleksi
    public function addBuku(Request $request, $id_koleksi_buku)
    {
        $request->validate([
            'id_buku' => 'required|exists:buku,id',

        ]);

        $peminjam = Auth::user()->peminjam;
        $koleksi = KoleksiBuku::findOrFail($id_koleksi_buku);

        if ($koleksi->id_peminjam !== $peminjam->id) {
            return back()->with('error', 'Anda tidak dapat mengubah koleksi milik orang lain.');
        }

        // Cek jika buku sudah ada di koleksi, tidak perlu ditambah lagi
        if ($koleksi->buku()->where('id_buku', $request->id_buku)->exists()) {
            return back()->with('info', 'Buku sudah ada dalam koleksi.');
        }

        $koleksi->buku()->attach($request->id_buku);

        return back()->with('success', 'Buku berhasil ditambahkan ke koleksi.');
    }

    // Menghapus buku dari koleksi
    public function removeBuku($koleksi_id, $buku_id)
    {
        $peminjam = Auth::user()->peminjam;
        $koleksi = KoleksiBuku::findOrFail($koleksi_id);

        if ($koleksi->id_peminjam !== $peminjam->id) {
            return back()->with('error', 'Anda tidak dapat menghapus buku dari koleksi orang lain.');
        }

        $koleksi->buku()->detach($buku_id);

        return back()->with('success', 'Buku berhasil dihapus dari koleksi.');
    }
    public function destroy($id)
    {
        $peminjam = Auth::user()->peminjam;
        $koleksi = KoleksiBuku::findOrFail($id);

        if ($koleksi->id_peminjam !== $peminjam->id) {
            return back()->with('error', 'Anda tidak dapat menghapus koleksi milik orang lain.');
        }

        $koleksi->delete();

        return back()->with('success', 'Koleksi berhasil dihapus.');
    }
}
