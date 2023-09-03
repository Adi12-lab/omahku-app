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
        Schema::create('properties', function (Blueprint $table) {
            $table->id();
            $table->string("name");
            $table->string("slug");
            $table->unsignedBigInteger("category_id");
            $table->integer("for")->default(0)->comment("0=sale, 1=rent,");
            $table->integer("status")->default(0)->comment("0=soldout, 1=active");
            $table->integer("isFeaatured")->default(0)->comment("0=no, 1=yes");
            $table->integer("size");
            $table->bigInteger("price");
            $table->longText("description");
            $table->integer("bedrooms")->nullable();
            $table->integer("bathrooms")->nullable();
            $table->integer("rooms")->nullable();
            $table->integer("province_id");
            $table->integer("city_id");
            $table->integer("subdistrict_id");
            $table->date("year_built");
            $table->timestamps();
            // $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
            // $table->foreign('province_id')->references('province_id')->on('tb_ro_provinces');
            // $table->foreign('city_id')->references('city_id')->on('tb_ro_cities');
            // $table->foreign('subdistrict_id')->references('subdistrict_id')->on('tb_ro_subdistricts');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('properties');
    }
};
