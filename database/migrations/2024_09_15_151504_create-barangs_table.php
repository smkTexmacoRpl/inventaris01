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
      Schema::create('barangs', function (Blueprint $table) {
        $table->id();
        $table->char('kode_barang',12)->unique();
        $table->string('nama_barang');
        $table->foreignId('merk_id')->constrained('merks')->cascadeOnDelete();
        $table->foreignId('jenis_id')->constrained('jenis')->cascadeOnDelete();
        $table->foreignId('lokasi_id')->constrained('lokasis')->cascadeOnDelete();        
        $table->foreignID('supplier_id')->constrained('suppliers')->cascadeOnDelete();
        $table->integer('jumlah_barang')->nullable();
        $table->integer('harga')->nullable();
        $table->string('gambar_barang')->nullable();
        $table->string('keterangan')->nullable();
        $table->timestamps();
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
      Schema::dropIfExists('barangs');
    }
};
