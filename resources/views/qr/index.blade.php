<!DOCTYPE html>
<html>
<head>
    <title>Warranty Verification</title>
</head>
<body>
    <h2>Produk Terverifikasi</h2>

    <p><b>Kode:</b> {{ $produk->kode_barang }}</p>
    <p><b>Nama:</b> {{ $produk->nama_produk }}</p>
    <p><b>Warna:</b> {{ $produk->warna }}</p>
    <p><b>Status:</b> {{ $produk->status ?? 'active' }}</p>
</body>
</html>
