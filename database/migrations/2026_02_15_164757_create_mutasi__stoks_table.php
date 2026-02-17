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
        Schema::create('mutasi__stoks', function (Blueprint $table) {
            $table->id();
            $table->foreignId("User_id")->references("id")->on("users")->onDelete("cascade");
            $table->foreignId("Produk_id")->references("id")->on("produks")->onDelete("cascade");
            $table->integer("qty");
            $table->integer("sisa");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mutasi__stoks');
    }
};
