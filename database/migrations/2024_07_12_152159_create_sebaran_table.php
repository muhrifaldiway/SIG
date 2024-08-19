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
        Schema::create('sebaran', function (Blueprint $table) {
            $table->id();
            $table->foreignId('satwa_id')->constrained('satwa_endemik')->onDelete('cascade');
            $table->foreignId('kawasan_id')->constrained('kawasan_konservasi')->onDelete('cascade');
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->date('tanggal');
            $table->integer('jumlah')->default(1);
            $table->text('keterangan')->nullable();
            $table->decimal('latitude', 10, 8);
            $table->decimal('longitude', 11, 8);
            $table->timestamps();
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sebaran');
    }
};
