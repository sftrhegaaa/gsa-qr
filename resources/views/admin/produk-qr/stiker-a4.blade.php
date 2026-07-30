<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">

<style>
@page {
    size: 40mm 30mm;
    margin: 0;
}

body {
    margin: 0;
    font-family: DejaVu Sans, sans-serif;
}

.label {
    width: 40mm;
    height: 30mm;
    page-break-inside: avoid;
    overflow: hidden;
    text-align: center;
}

.qr {
    width: 21mm; 
    height: auto;
    display: block;
    margin: 3mm auto 0 auto;
}

.kode {
     font-size: 4.3pt;
    font-weight: 700;
    margin-top: 0.4mm;
    line-height: 1.0;
    max-height: 6mm;
    overflow: hidden;
    text-align: center;
    word-break: break-word;

    transform: translateX(-0.5mm); 
}
</style>
</head>

<body>

    @foreach($stickers as $sticker)

    <div class="label">
    @php
        $qrBase64 = null;

        /*
        * Prioritas pertama:
        * gunakan file QR yang tersimpan.
        */
        if (
            !empty($sticker->qr_path) &&
            \Illuminate\Support\Facades\Storage::disk('public')
                ->exists($sticker->qr_path)
        ) {
            $qrBase64 = base64_encode(
                \Illuminate\Support\Facades\Storage::disk('public')
                    ->get($sticker->qr_path)
            );
        }

        /*
        * Fallback:
        * kalau qr_path null atau file hilang,
        * generate QR langsung dari isi kolom qr.
        */
        if (!$qrBase64 && !empty($sticker->qr)) {
            $qrPng = \SimpleSoftwareIO\QrCode\Facades\QrCode::format('png')
                ->size(300)
                ->margin(1)
                ->generate($sticker->qr);

            $qrBase64 = base64_encode($qrPng);
        }
    @endphp

    @if ($qrBase64)
        <img
            class="qr"
            src="data:image/png;base64,{{ $qrBase64 }}"
            alt="QR Code"
        >
    @else
        <div class="qr-missing">
            QR tidak tersedia
        </div>
    @endif
    {{-- <img class="qr" src="{{ asset('storage/'.$sticker->qr_path) }}"> --}}
    {{-- <img class="qr" src="data:image/png;base64,{{ base64_encode(file_get_contents(storage_path('app/public/' . $sticker->qr_path))) }}"> --}}
    @php
        $kode = strtoupper(trim($sticker->kode_barang));

        // Hilangkan hanya tanda "-" di depan
        $kode = ltrim($kode, '-');
    @endphp

    <div class="kode">
        {{ $kode }}
</div>
</div>

@endforeach

</body>
</html>