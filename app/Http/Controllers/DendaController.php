<?php

namespace App\Http\Controllers;

use App\Models\Denda;
use Illuminate\Http\Request;

class DendaController extends Controller
{
    public function index()
    {
        $dendas = Denda::all();
        return view('petugas.pages.denda.tb-denda', compact('dendas'));
    }

    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
        $dendas = Denda::find($id);
        if (!$dendas) {
            return redirect()->route('denda.index')->with('error', 'Data tidak ditemukan');
        }
        return view('petugas.pages.denda.edit-denda', compact('dendas'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'id_peminjam' => 'required|exists:peminjam,id',
            'nominal' => 'required|integer|min:0',
            'dibayar' => 'required|integer|min:0',
            'status' => 'required|in:lunas,belum',
        ]);

        $dendas = Denda::find($id);
        if (!$dendas) {
            return redirect()->route('denda.index')->with('error', 'Data tidak ditemukan');
        }

        $dendas->update([
            'id_peminjam' => $request->id_peminjam,
            'nominal' => $request->nominal,
            'dibayar' => $request->dibayar,
            'status' => $request->status,
        ]);

        return redirect()->route('denda.index')->with('success', 'Data berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $dendas = Denda::find($id);
        if (!$dendas) {
            return redirect()->route('denda.index')->with('error', 'Data tidak ditemukan');
        }
        $dendas->delete();
        return redirect()->route('denda.index')->with('success', 'Data berhasil dihapus');
    }
}
