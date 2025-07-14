<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('laporans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('category_laporan_id');
            $table->foreignId('kanal_laporan_id');
            $table->foreignId('wilayah_id');
            $table->foreignId('user_id');
            $table->string('nama_pelapor');
            $table->string('phone');
            $table->string('detail_laporan');
            $table->string('documentasi');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('laporans');
    }
};
