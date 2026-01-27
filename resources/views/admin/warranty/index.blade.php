@extends('admin.layouts.app')

@section('title', 'History Warranty')

@section('content')
<div class="card shadow-sm">
    <div class="card-header">
        <h5 class="mb-0">History Warranty (User Scan QR)</h5>
    </div>

    <div class="card-body">
        <div class="table-responsive mt-5 mb-5">
            <table class="table table-bordered table-striped" id="warrantyTable">
                <thead class="table-dark">
                    <tr>
                        <th>No</th>
                        <th>Kode Barang</th>
                        <th>Nama Produk</th>
                        <th>Warna</th>
                        <th>Nama User</th>
                        <th>Email</th>
                        <th>Expired At</th>
                        <th>Status</th>
                        <th>Tanggal Registrasi</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
$(function () {
    $('#warrantyTable').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ route('admin.warranty.data') }}",
        columns: [
            { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false },
            { data: 'kode_barang', name: 'produk.kode_barang' },
            { data: 'nama_produk', name: 'produk.nama_produk' },
            { data: 'warna', name: 'produk.warna' },
            { data: 'nama', name: 'nama' },
            { data: 'email', name: 'email' },
            { data: 'expired_at', orderable: false, searchable: false },
            { data: 'status', name: 'status', orderable: false, searchable: false },
            { data: 'created_at', name: 'created_at' },
        ]
    });
});
</script>
@endpush

