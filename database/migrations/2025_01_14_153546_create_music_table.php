<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('music', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('category_id')->index();
            $table->foreign('category_id')->references('id')->on('categories')->cascadeOnDelete();
            $table->unsignedBigInteger('artist_id')->index();
            $table->foreign('artist_id')->references('id')->on('artists')->cascadeOnDelete();
            $table->unsignedBigInteger('album_id')->index();
            $table->foreign('album_id')->references('id')->on('albums')->cascadeOnDelete();
            $table->string('name');
            $table->string('audio')->nullable();
            $table->unsignedInteger('viewed')->default(0);
            $table->unsignedInteger('downloaded')->default(0);
            $table->unsignedInteger('favorites')->default(0);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('music');
    }
};
