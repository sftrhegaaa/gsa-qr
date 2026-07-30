<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('warranties', function (Blueprint $table) {
    $table->id();
    $table->foreignId('produk_qr_log_id')->constrained('produk_qr_log')->cascadeOnDelete();
    $table->string('nama');
    $table->string('email');
    $table->text('alamat');
    $table->string('tempat_lahir');
    $table->date('tanggal_lahir');
    $table->enum('gender', ['L', 'P']);

    $table->timestamps();
});

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('warranties');
    }
};
