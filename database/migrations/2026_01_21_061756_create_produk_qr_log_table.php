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
        Schema::create('produk_qr_log', function (Blueprint $table) {
            $table->id();

            $table->string('kode_barang')->unique();
            $table->string('nama_produk');
            $table->string('warna')->nullable();

            $table->text('qr'); // url QR / path QR
            $table->enum('status', ['active', 'inactive'])->default('active');

            $table->foreignId('owner_user_id')
                  ->nullable()
                  ->constrained('users')
                  ->nullOnDelete();

            $table->timestamp('activated_at')->nullable();
            $table->timestamp('expired_at')->nullable();

            $table->timestamps(); // created_at & updated_at
        });  
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('produk_qr_log');
    }
};
