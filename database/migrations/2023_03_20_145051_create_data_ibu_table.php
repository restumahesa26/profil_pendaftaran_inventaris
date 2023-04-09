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
        Schema::create('data_ibu', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pendaftaran_id')->references('id')->on('pendaftaran_ppdb')->onUpdate('cascade')->onDelete('cascade');
            $table->string('nama');
            $table->string('panggilan');
            $table->string('agama');
            $table->string('no_hp');
            $table->string('tempat_lahir');
            $table->date('tanggal_lahir');
            $table->string('pendidikan_terakhir');
            $table->enum('status_nikah', ['kawin-tercatat', 'kawin-belum-tercatat', 'cerai-hidup', 'cerai-mati']);
            $table->integer('jumlah_anak');
            $table->string('suku')->nullable();
            $table->string('pekerjaan');
            $table->string('alamat');
            $table->decimal('penghasilan', 15, 2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('data_ibu');
    }
};
