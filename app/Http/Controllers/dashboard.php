<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produk_Model;

class dashboard extends Controller
{
    public function index()
    {
        $produk = Produk_Model::count(); 
        $stokminim = Produk_Model::whereColumn('stok', '<=', 'stok_minim')->count();
        $totalNilaiStok = Produk_Model::get()->sum(fn($p) => $p->harga * $p->stok);
        $produk_minim = Produk_Model::whereColumn('stok', '<=', 'stok_minim')->get();

        return view('dashboard.index', compact('produk', 'stokminim', 'totalNilaiStok', 'produk_minim'));
    }
}
