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
        Schema::create('pembelian_pakans', function (Blueprint $table) {
                $table->id();
                $table->foreignId('supplier_id')->constrained('suppliers'); // Menghubungkan ke tabel suppliers
                $table->foreignId('pakan_id')->constrained('pakans'); // Menghubungkan ke tabel pakans
                $table->integer('jumlah');
                $table->decimal('harga_total', 10, 2);
                $table->date('tanggal_pembelian');
                $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pembelian_pakans');
    }
};
