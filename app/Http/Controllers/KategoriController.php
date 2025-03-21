<?php

namespace App\Http\Controllers;

use App\Models\Kategoribuku;
use Illuminate\Http\Request;

class KategoriController extends Controller
{

    public function index()
    {
        $kategori_buku = Kategoribuku::paginate(5);
        return view('admin.pages.kategori.tb-kategori', compact('kategori_buku'));
    }

    public function create()
    {
        return view('admin.pages.kategori.create-kategori');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_kategori' => 'required|string|max:255',
        ]);

        Kategoribuku::create([
            'nama_kategori' => $request->nama_kategori,
        ]);

        return redirect()->route('kategori.index')->with('success', 'Kategori ditambahkan');
    }

    public function show(string $id)
    {
        //
    }

    public function edit($id)

    {
        $kat = Kategoribuku::find($id);
        if (!$kat) {
            return redirect()->route('kategori.index')->with('error', 'Kategori tidak ditemukan');
        }
        return view('admin.pages.kategori.edit-kategori', compact('kat'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_kategori' => 'required|string|max:255'
        ]);

        $kategori_buku = Kategoribuku::find($id);

        // Cek apakah data ditemukan
        if (!$kategori_buku) {
            return redirect()->route('kategori.index')->with('error', 'Kategori tidak ditemukan');
        }

        // Update data
        $kategori_buku->update([
            'nama_kategori' => $request->nama_kategori
        ]);

        return redirect()->route('kategori.index')->with('success', 'Kategori diperbaharui');
    }

    public function destroy(Kategoribuku $kategori_buku)
    {
        $kategori_buku->delete();
        return redirect()->route('kategori.index')->with('success', 'Kategori dihapus');
    }
}
