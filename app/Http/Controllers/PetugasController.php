<?php

namespace App\Http\Controllers;

use App\Models\Petugas;
use App\Models\User;
use Illuminate\Http\Request;

class PetugasController extends Controller
{
    public function index()
    {
        $petugas = Petugas::all();
        return view('admin.pages.petugas.tb-petugas', compact('petugas'));
    }

    public function create()
    {
        // Ambil hanya user dengan role 'petugas' yang belum ada di tabel petugas
        $users = User::where('role', 'petugas')
            ->whereNotIn('id', Petugas::pluck('id_user'))
            ->get();

        // dd($users);

        return view('admin.pages.petugas.create-petugas', compact('users'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_user' => 'required|exists:users,id',
            'nama_lengkap' => 'required|string|max:255',
            'phone' => 'required|string|max:15',
            'alamat' => 'required|string|max:255',
            'poto' => 'nullable|url'
        ]);
        Petugas::create([
            'id_user' => $request->id_user,
            'email' => User::find($request->id_user)->email,
            'nama_lengkap' => $request->nama_lengkap,
            'phone' => $request->phone,
            'alamat' => $request->alamat,
            'poto' => $request->poto ?? 'https://api.dicebear.com/9.x/lorelei/svg',
            'role' => 'petugas',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        return redirect()->route('petugas.index')->with('success', 'Petugas ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    public function edit($id)
    {
        $petugas = Petugas::find($id);
        if (!$petugas) {
            return redirect()->route('petugas.index')->with('error', 'Petugas tidak ditemukan');
        }

        return view('admin.pages.petugas.edit-petugas', compact('petugas'));
    }

    public function update(Request $request,  $id)
    {
        $request->validate([
            'nama_lengkap' => 'required|string|max:255',
            'phone' => 'required|string|max:15',
            'alamat' => 'required|string|max:255',
            'poto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048'
        ]);

        $petugas = Petugas::find($id);
        if (!$petugas) {
            return redirect()->route('petugas.index')->with('error', 'Petugas tidak ditemukan');
        }

        if ($request->hasFile('poto')) {
            $file = $request->file('poto');
            $filename = time() . '.' . $file->getClientOriginalName();
            $path = $file->storeAs('public/petugas', $filename);
            $petugas->poto = 'storage/petugas/' . $filename;
        }

        $petugas->update([
            'nama_lengkap' => $request->nama_lengkap,
            'phone' => $request->phone,
            'alamat' => $request->alamat,
        ]);

        return redirect()->route('petugas.index')->with('success', 'Petugas diperbaharui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $petugas = Petugas::find($id);
        if (!$petugas) {
            return redirect()->back()->with('error', 'Petugas tidak ditemukan');
        }
        // Hapus foto jika ada
        if ($petugas->poto && file_exists(public_path($petugas->poto))) {
            unlink(public_path($petugas->poto));
        }

        $petugas->delete();
        return redirect()->route('petugas.index')->with('success', 'Petugas berhasil dihapus');
    }
}
