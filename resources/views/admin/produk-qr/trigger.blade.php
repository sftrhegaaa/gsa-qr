@extends('admin.layouts.app')

@section('content')
<div class="text-center py-5">
    <div class="spinner-border text-primary mb-3"></div>
    <p>Sedang menyiapkan QR Code...</p>
</div>

<script>
    window.onload = function () {
        // auto download
        const a = document.createElement('a');
        a.href = "{{ route('admin.produk_qr.downloadQr', $id) }}";
        a.click();

        // redirect ke index
        setTimeout(() => {
            window.location.href = "{{ route('admin.produk_qr.index') }}";
        }, 1200);
    }
</script>
@endsection
