@extends('admin.layouts.app')

@section('content')
<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h3 class="mb-0">Data Produk QR</h3>
        <a href="{{ route('admin.produk_qr.create') }}" class="btn btn-primary btn-sm">
            + Tambah Produk
        </a>
    </div>

    <div class="card shadow-sm">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-hover align-middle text-center">
                    <thead class="table-dark">
                        <tr>
                            <th>No</th>
                            <th>Kode Barang</th>
                            <th>Nama Produk</th>
                            <th>Warna</th>
                            <th>QR Code</th>
                            <th>Download</th>
                            <th>Status</th>
                            <th width="120">Aksi</th>

                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($produk as $p)
                        <tr>
                            <td>{{ $loop->iteration }}.</td>
                            <td>{{ $p->kode_barang }}</td>
                            <td>{{ $p->nama_produk }}</td>
                            <td>{{ $p->warna }}</td>
                            <td>
                                {!! QrCode::size(50)->generate($p->qr) !!}
                                <div class="mt-2 small fw-bold">
                                    {{ $p->kode_barang }}
                                </div>
                            </td>
                            <td class="text-center">
                                 <a
                                    href="{{ route('admin.produk_qr.svg', $p->id) }}"
                                    class="btn btn-sm btn-primary">
                                    Download SVG
                                </a>
                            </td>


                            <td>
                                <span class="badge bg-success">
                                    {{ $p->status ?? 'active' }}
                                </span>
                            </td>
                            <td class="text-center">
                                <a href="{{ route('admin.produk_qr.edit', $p->id) }}"
                                class="btn btn-warning btn-sm">
                                    Edit
                                </a>

                                <form action="{{ route('admin.produk_qr.destroy', $p->id) }}"
                                    method="POST"
                                    class="d-inline"
                                    onsubmit="return confirm('Yakin hapus produk ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger btn-sm">
                                        Hapus
                                    </button>
                                </form>
                            </td>

                        </tr>
                        @empty
                        <tr>
                            <td colspan="6" class="text-muted">
                                Data belum ada
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
