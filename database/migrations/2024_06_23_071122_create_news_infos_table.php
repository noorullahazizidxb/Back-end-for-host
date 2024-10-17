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
        Schema::create('news_infos', function (Blueprint $table) {
            $table->id();
            $table->string('start_month', 10);
            $table->string('end_month', 10);
            $table->string('year', 4);
            $table->string('image_alt', 125);
            $table->string('image');
            $table->string('file');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('news_infos');
    }
};
