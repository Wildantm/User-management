<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::create('keluargas', function (Blueprint $table) {
        $table->id();
        $table->string('npk');
        $table->enum('jenis', ['ayah', 'ibu', 'saudara']);
        $table->string('nama');
        $table->date('tanggal_lahir')->nullable();
        $table->string('pekerjaan')->nullable();
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('keluargas');
    }
};
