<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\ProdukQrLog;


class QrController extends Controller
{
    public function show($kode)
    {
        $produk = ProdukQrLog::where('kode_barang', $kode)->first();

        if (!$produk) {
            return abort(404, 'QR tidak ditemukan');
        }

        return view('qr.index', compact('produk'));
    }
}
