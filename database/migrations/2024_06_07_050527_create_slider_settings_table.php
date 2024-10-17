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
        Schema::create('slider_settings', function (Blueprint $table) {
            $table->id();
            $table->string('slider_text', 100)->default('Carving Pathways For Better Future');
            $table->integer('interval')->default(800);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('slider_settings');
    }
};
