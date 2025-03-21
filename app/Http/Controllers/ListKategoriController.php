<?php

namespace App\Http\Controllers;

use App\Models\Listkategori;
use Illuminate\Http\Request;

class ListKategoriController extends Controller
{
    public function index()
    {
        $listKategori = Listkategori::with(['buku', 'kategori'])->paginate(5);
        return view('admin.pages.list_kategori.index', compact('listKategori'));
    }
}
