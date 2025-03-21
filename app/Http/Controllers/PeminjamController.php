<?php

namespace App\Http\Controllers;

use App\Models\Peminjam;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class PeminjamController extends Controller
{
    public function index()
    {
        $peminjams = Peminjam::all();
        return view('petugas.pages.peminjam.tb-peminjam', compact('peminjams'));
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
    // public function store(Request $request)
    // {
    //     $request->validate([
    //         'id_user' => 'required|exists:users,id',
    //         'nama_lengkap' => 'required|string|max:255',
    //         'phone' => 'required|string|max:15',
    //         'alamat' => 'required|string|max:255',
    //         'poto' => 'nullable|url'
    //     ]);
    //     Peminjam::create([
    //         'id_user' => $request->id_user,
    //         'email' => User::find($request->id_user)->email,
    //         'nama_lengkap' => $request->nama_lengkap,
    //         'location' => $request->location,
    //         'phone' => $request->phone,
    //         'alamat' => $request->alamat,
    //         'poto' => $request->poto ?? 'https://api.dicebear.com/9.x/lorelei/svg',
    //         'created_at' => now(),
    //         'updated_at' => now(),
    //     ]);
    // }

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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $peminjam = Peminjam::findOrFail($id);


        $validated = $request->validate([
            'nama_lengkap' => 'required|string|max:255',
            'provinsi' => 'required|integer',
            'kabupaten' => 'required|integer',
            'kecamatan' => 'required|integer',
            'alamat' => 'required|string',
            'phone' => 'required|string',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $locationData = [
            'provinsi_id' => $request->provinsi,
            'kabupaten_id' => $request->kabupaten,
            'kecamatan_id' => $request->kecamatan,
            'provinsi' => $request->input('provinsi_name'),
            'kabupaten' => $request->input('kabupaten_name'),
            'kecamatan' => $request->input('kecamatan_name'),
        ];

        $peminjam->update([
            'nama_lengkap' => $validated['nama_lengkap'],
            'location' => $locationData,
            'alamat' => $validated['alamat'],
            'phone' => $validated['phone'],
            'photo' => $path ?? $peminjam->photo, // Tetap menggunakan foto lama jika tidak ada foto baru
        ]);

        return redirect()->route('peminjam.index')->with('success', 'Peminjam berhasil diperbaharui');
    }

    // Mendapatkan data Provinsi
    public function getProvinces()
    {
        $response = Http::get('https://www.emsifa.com/api-wilayah-indonesia/api/provinces.json');
        return response()->json($response->json());
    }

    // Mendapatkan data Kabupaten berdasarkan Provinsi
    public function getKabupatenByProvinsi($provinsiId)
    {
        $response = Http::get("https://www.emsifa.com/api-wilayah-indonesia/api/regencies/{$provinsiId}.json");
        return response()->json($response->json());
    }

    // Mendapatkan data Kecamatan berdasarkan Kabupaten
    public function getKecamatanByKabupaten($kabupatenId)
    {
        $response = Http::get("https://www.emsifa.com/api-wilayah-indonesia/api/districts/{$kabupatenId}.json");
        return response()->json($response->json());
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Peminjam $peminjam)
    {
        $peminjam->delete();

        return redirect()->route('peminjam.index')->with('success', 'Peminjam berhasil dihapus');
    }
}
