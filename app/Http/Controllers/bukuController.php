<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Kategoribuku;
use App\Models\Ulasan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class bukuController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index()
    {
        $buku = Buku::with('relasi_kategori')->paginate(5);
        return view('admin.pages.buku.tb-buku', compact('buku'));
    }

    public function create()
    {
        $kategori = Kategoribuku::all();
        return view('admin.pages.buku.create-buku', compact('kategori'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'id_kategori' => 'required|exists:kategori_buku,id',
            'penulis' => 'required|string|max:255',
            'penerbit' => 'required|string|max:255',
            'description' => 'required|string',
            'code' => 'required|string|unique:buku,code',
            'tahun_terbit' => 'required|integer|min:1000|max:' . date('Y'),
            'jumlah' => 'required|integer|min:1',
            'poto_buku' => 'nullable|image|mimes:jpg,jpeg,png|max:2048', // Maksimal 2MB
        ]);

        $buku = new Buku();
        $buku->judul = $request->judul;
        $buku->id_kategori = $request->id_kategori;
        $buku->penulis = $request->penulis;
        $buku->penerbit = $request->penerbit;
        $buku->description = $request->description;
        $buku->code = $request->code;
        $buku->tahun_terbit = $request->tahun_terbit;
        $buku->jumlah = $request->jumlah;

        if ($request->hasFile('poto_buku')) {
            $file = $request->file('poto_buku');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('img/bookcovers'), $filename);
            $buku->poto_buku = 'img/bookcovers/' . $filename;
        } else {
            $buku->poto_buku = 'img/bookcovers/default-cover.jpg';
        }
        $buku->save();
        return redirect()->route('buku.index')->with('success', 'Buku berhasil ditambahkan');
    }

    public function show(string $id) {}

    public function cari(Request $request)
    {
        $keyword = $request->input('keyword');

        // Cari buku berdasarkan judul yang mengandung keyword (case-insensitive) dan menampilkan yang aktif saja
        $buku = Buku::where('status', 'aktif')
            ->where(function ($query) use ($keyword) {
                $query->where('judul', 'like', "%$keyword%")
                    ->orWhere('penulis', 'like', "%$keyword%")
                    ->orWhere('penerbit', 'like', "%$keyword%");
            })
            ->get();

        return response()->json($buku);
    }
    public function detail($id)
    {
        Log::info("Mencari buku dengan ID: " . $id);
        $bukuss = Buku::with(['relasi_kategori'])->find($id);
        $ulasanBuku = Ulasan::with(['buku', 'peminjam'])->where('id_buku', $id)->get();
        $peminjam = auth()->user()->peminjam ?? null;
        $koleksis = $peminjam ? $peminjam->koleksi()->get() : collect();
        return view('peminjam.pages.view-detail-buku', compact('ulasanBuku', 'bukuss', 'koleksis'));
    }
    public function edit(string $id)
    {
        // $buku = Buku::findOrFail($id);
        $book = Buku::with('relasi_kategori')->findOrFail($id);
        $kategori = Kategoribuku::all(); //Untuk pilihan dropdown
        return view('admin.pages.buku.edit-buku', compact('book', 'kategori'));
    }
    public function update(Request $request, string $id)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'id_kategori' => 'required|exists:kategori_buku,id',
            'penulis' => 'required|string|max:255',
            'penerbit' => 'required|string|max:255',
            'description' => 'required|string',
            'code' => 'required|string|unique:buku,code,' . $id,
            'tahun_terbit' => 'required|integer|min:1000|max:' . date('Y'),
            'jumlah' => 'required|integer|min:1',
            'status' => 'required|in:aktif,nonaktif',
            'poto_buku' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $buku = Buku::findOrFail($id);
        $buku->judul = $request->judul;
        $buku->id_kategori = $request->id_kategori;
        $buku->penulis = $request->penulis;
        $buku->penerbit = $request->penerbit;
        $buku->description = $request->description;
        $buku->code = $request->code;
        $buku->tahun_terbit = $request->tahun_terbit;
        $buku->jumlah = $request->jumlah;
        $buku->status = $request->status;

        if ($request->hasFile('poto_buku')) {
            $file = $request->file('poto_buku');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('img/bookcovers'), $filename);
            $buku->poto_buku = 'img/bookcovers/' . $filename;
        }

        $buku->save();

        return redirect()->route('buku.index')->with('success', 'Buku berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $buku = Buku::find($id);
        if (!$buku) {
            return redirect()->back()->with('error', 'Buku tidak ditemukan');
        }
        $buku->delete();
        return redirect()->route('buku.index')->with('success', 'Buku berhasil dihapus');
    }
}
