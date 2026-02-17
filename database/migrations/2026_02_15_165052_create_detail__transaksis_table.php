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
        Schema::create('detail__transaksis', function (Blueprint $table) {
            $table->foreignId("User_id")->references("id")->on("users")->onDelete("cascade");
            $table->foreignId("Transaksi_id")->references("id")->on("transaksis")->onDelete("cascade");
            $table->foreignId("Produk_id")->references("id")->on("produks")->onDelete("cascade");
            $table->integer("qty");
            $table->integer("subtotal");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detail__transaksis');
    }
};
