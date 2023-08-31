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
        Schema::create('propeties', function (Blueprint $table) {
            $table->id();
            $table->string("name");
            $table->unsignedBigInteger("category_id");
            $table->integer("status")->default(0)->comment("0=rent, 1=sale, 2=soldout");
            $table->integer("size");
            $table->bigInteger("price");
            $table->longText("description");
            $table->integer("bedrooms")->nullable();
            $table->integer("bathrooms")->nullable();
            $table->integer("rooms")->nullable();
            $table->date("year_built");
            $table->timestamps();
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('propeties');
    }
};
