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
        Schema::create('surat_masuks', function (Blueprint $table) {
            $table->id();
            $table->integer('no_surat')->unique();
            $table->date('tgl_surat');
            $table->date('tgl_terima');
            $table->string('pengirim');
            $table->text('perihal');  
            $table->string('file_surat')->nullable();
            $table->enum('status', ['diproses', 'didisposisi', 'ditindaklanjuti'])->default('diproses');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('surat_masuks');
    }
};
