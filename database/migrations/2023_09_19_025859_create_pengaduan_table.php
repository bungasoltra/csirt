<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('pengaduan', function (Blueprint $table) {
            $table->id();
            $table->string('ticket_number')->unique()->nullable();
            $table->string('name');
            $table->string('no_hp');
            $table->string('opd');
            $table->text('isi_pengaduan');
            $table->string('lampiran')->nullable();
            $table->enum('status', ['Masuk', 'Proses', 'Selesai'])->default('Masuk');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('pengaduan');
    }
};
