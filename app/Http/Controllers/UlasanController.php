<?php

namespace App\Http\Controllers;

use App\Models\Peminjam;
use App\Models\Ulasan;
use Illuminate\Http\Request;

class UlasanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ulasan = Ulasan::all();
        return view('petugas.pages.ulasan.tb-ulasan', compact('ulasan'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, $id)
    {
        $request->validate([
            'ulasan' => 'required|string|max:500'
        ]);

        $peminjam = Peminjam::where('id_user', auth()->id())->firstOrFail();

        Ulasan::create([
            'id_peminjam' => $peminjam->id,
            'id_buku' => $id,
            'ulasan' => $request->ulasan,
        ]);

        return back()->with('ulasan_success', 'Ulasan berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $ulasan = Ulasan::find($id);
        if (!$ulasan) {
            return redirect()->route('ulasan.index')->with('error', 'Data tidak ditemukan');
        }
        return view('petugas.pages.ulasan.edit-ulasan');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'id_buku' => 'required|exists:buku,id',
            'id_user' => 'required|exists:users,id',
            'rating' => 'required|integer|min:1|max:5',
            'ulasan' => 'required|string',
        ]);

        $ulasan = Ulasan::find($id);
        if (!$ulasan) {
            return redirect()->route('ulasan.index')->with('error', 'Data tidak ditemukan');
        }

        $ulasan->id_buku = $request->id_buku;
        $ulasan->id_user = $request->id_user;
        $ulasan->rating = $request->rating;
        $ulasan->ulasan = $request->ulasan;
        $ulasan->save();
        return redirect()->route('ulasan.index')->with('success', 'Ulasan berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $ulasan = Ulasan::find($id);
        if (!$ulasan) {
            return redirect()->route('ulasan.index')->with('error', 'Data tidak ditemukan');
        }
        $ulasan->delete();
        return redirect()->route('ulasan.index')->with('success', 'Ulasan berhasil dihapus');
    }
}
