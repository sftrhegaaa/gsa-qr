<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Registrasi Warranty</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    {{-- Bootstrap 5 --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

     <style>
        .btn-brand {
            background-color: #feea00;
            color: #000;
            font-weight: 600;
            border: none;
        }
        .btn-brand:hover {
            background-color: #e6d500;
            color: #000;
        }
    </style>
</head>
<body class="bg-light">

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-6 col-md-8 col-sm-12">

            <div class="card shadow-sm border-0">
                <div class="card-body p-4">

                    
                    {{-- LOGO --}}
                    <div class="text-center mb-3">
                        <img 
                            src="{{ asset('assets/LOGO-GMA.png') }}" 
                            alt="Logo Brand" 
                            style="max-height:70px"
                        >
                    </div>

                    {{-- HEADER --}}
                    <div class="text-center mb-4">
                        <h4 class="fw-bold">Registrasi Warranty</h4>
                        <p class="text-muted small mb-0">
                            Silahkan lengkapi data untuk mengaktifkan warranty produk
                        </p>
                    </div>

                    {{-- INFO PRODUK --}}
                    {{-- <div class="alert alert-success small">
                        <strong>Produk:</strong><br>
                        {{ $produk->nama_produk }}<br><br>

                        <strong>Kode Produk:</strong><br>
                        {{ $produk->kode_barang }}
                    </div> --}}

                    {{-- ALERT SUCCESS --}}
                    @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    {{-- FORM --}}
                    <form method="POST" action="{{ route('warranty.store', $produk->kode_barang) }}">
                        @csrf

                        <div class="mb-3">
                            <label class="form-label">Nama Lengkap</label>
                            <input type="text" name="nama" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Email</label>
                            <input type="email" name="email" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Alamat</label>
                            <textarea name="alamat" rows="3" class="form-control" required></textarea>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Tempat Lahir</label>
                                <input type="text" name="tempat_lahir" class="form-control" required>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label class="form-label">Tanggal Lahir</label>
                                <input type="date" name="tanggal_lahir" class="form-control" required>
                            </div>
                        </div>

                        <div class="mb-4">
                            <label class="form-label">Gender</label>
                            <select name="gender" class="form-select" required>
                                <option value="">Pilih Gender</option>
                                <option value="L">Laki-laki</option>
                                <option value="P">Perempuan</option>
                            </select>
                        </div>

                        <button type="submit" class="btn btn-brand w-100">
                            Register Warranty
                        </button>
                    </form>

                </div>
            </div>

            <div class="text-center mt-3">
                <small class="text-muted">
                    © {{ date('Y') }} Warranty System by GMA Product Series
                </small>
            </div>

        </div>
    </div>
</div>

</body>
</html>
