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
        Schema::create('jenis__pembelians', function (Blueprint $table) {
            $table->id();
            $table->foreignId("User_id")->references("id")->on("users")->onDelete("cascade");
            $table->string("nama_jenis_pembelian");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jenis__pembelians');
    }
};
