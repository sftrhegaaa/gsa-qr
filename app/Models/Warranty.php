<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Warranty extends Model
{
   
    use HasFactory;
    protected $table = 'warranties'; // ⬅️ WAJIB (jaga-jaga)


    protected $fillable = [
        'produk_qr_log_id',
        'nama',
        'email',
        'alamat',
        'tempat_lahir',
        'tanggal_lahir',
        'gender',
    ];

    public function produk()
    {
    return $this->belongsTo(
            ProdukQrLog::class,
            'produk_qr_log_id',
            'id'
        );    }
}


