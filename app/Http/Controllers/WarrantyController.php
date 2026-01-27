<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProdukQrLog;
use App\Models\Warranty;

class WarrantyController extends Controller
{
    public function create($kode)
    {
        $produk = ProdukQrLog::where('kode_barang', $kode)
            ->where('status', 'active')
            ->firstOrFail();

        return view('warranty.create', compact('produk'));
    }

    public function store(Request $request, $kode)
    {

        $produk = ProdukQrLog::where('kode_barang', $kode)->firstOrFail();

        $request->validate([
            'nama'          => 'required|string',
            'email'         => 'required|email',
            'alamat'        => 'required|string',
            'tempat_lahir'  => 'required|string',
            'tanggal_lahir' => 'required|date',
            'gender'        => 'required|in:L,P',
        ]);

        Warranty::create([
            'produk_qr_log_id' => $produk->id,
            'nama'             => $request->nama,
            'email'            => $request->email,
            'alamat'           => $request->alamat,
            'tempat_lahir'     => $request->tempat_lahir,
            'tanggal_lahir'    => $request->tanggal_lahir,
            'gender'           => $request->gender,
        ]);

        return redirect()->route('warranty.verified', $produk->kode_barang);

            //  dd('MASUK STORE', $request->all(), $kode);

    }

    public function verified($kode)
    {
        $produk = ProdukQrLog::where('kode_barang', $kode)->firstOrFail();

        $warranty = Warranty::where('produk_qr_log_id', $produk->id)
            ->latest()
            ->firstOrFail();

        return view('warranty.verified', compact('produk', 'warranty'));
    }

}
