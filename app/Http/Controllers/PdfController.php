<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf; // pastikan sudah install barryvdh/laravel-dompdf
use App\Models\Produk_Model;

class PdfController extends Controller
{
    public function cetakStok(Request $request)
    {
        // Ambil data yang sama persis seperti di halaman dashboard
        $produk_minim = Produk_Model::whereColumn('stok', '<=', 'stok_minim')->get();
        $products = Produk_Model::all();

        // Render Blade yang sama dengan halaman web (bisa dipakai ulang!)
        $pdf = Pdf::loadView('laporan.print', compact('produk_minim', 'products'));

        // Setting kertas
        $pdf->setPaper('A4', 'portrait');

        // LANGSUNG DOWNLOAD (ini yang kamu mau)
        return $pdf->download('Laporan ' . date('d-m-Y') . '.pdf');
    }
}