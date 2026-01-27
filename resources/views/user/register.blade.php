<!DOCTYPE html>
<html>
<head>
    <title>Registrasi Warranty</title>
</head>
<body>

<h2>Registrasi Warranty</h2>

<p><strong>Produk:</strong> {{ $produk->nama_produk }}</p>
<p><strong>Kode:</strong> {{ $produk->kode_barang }}</p>

@if(session('success'))
    <p style="color:green">{{ session('success') }}</p>
@endif

<form method="POST" action="{{ route('warranty.store', $produk->kode_barang) }}">
    @csrf

    <input name="nama" placeholder="Nama Lengkap"><br><br>
    <input name="email" placeholder="Email"><br><br>
    <textarea name="alamat" placeholder="Alamat"></textarea><br><br>
    <input name="tempat_lahir" placeholder="Tempat Lahir"><br><br>
    <input type="date" name="tanggal_lahir"><br><br>

    <select name="gender">
        <option value="">Pilih Gender</option>
        <option value="L">Laki-laki</option>
        <option value="P">Perempuan</option>
    </select><br><br>

    <button type="submit">Register Warranty</button>
</form>

</body>
</html>
