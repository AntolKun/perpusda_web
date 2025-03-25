<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('buku', function (Blueprint $table) {
            $table->id();
            $table->string('judulbuku');
            $table->string('isbn')->unique();
            $table->string('penerbit');
            $table->year('tahun_terbit');
            $table->enum('stok', ['Tersedia', 'Tidak Tersedia']);
            $table->string('penulis');
            $table->integer('halaman');
            $table->text('deskripsi')->nullable();
            $table->string('gambar')->nullable();
            $table->foreignId('kategori_id')->constrained('kategori_buku')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('buku');
    }
};
