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
        Schema::create('log_lansias', function (Blueprint $table) {
            $table->id();
            $table->foreignId('lansia_id');
            $table->string('aktivitas');
            $table->string('user');
            $table->date('tanggal');
            $table->timestamp('waktu_dibuat');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('log_lansias');
    }
};
