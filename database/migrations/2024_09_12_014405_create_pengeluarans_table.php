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
        Schema::create('pengeluarans', function (Blueprint $table) {
            $table->id();
            // $table->string('nama_pengeluaran');
            $table->integer('jumlah_pengeluaran');
            $table->date('tanggal_pengeluaran');
            $table->unsignedBigInteger('pemasukan_id');
            
            $table->foreign('pemasukan_id')->references('id')->on('pemasukans')->cascadeOnDelete()->cascadeOnUpdate();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengeluarans');
    }
};
