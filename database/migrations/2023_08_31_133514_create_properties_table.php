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
            $table->engine = 'InnoDB';
            $table->id();
            $table->unsignedBigInteger("agent_id"); //typo
            $table->string("name", 40);
            $table->string("slug", 40);
            $table->unsignedBigInteger("category_id");
            $table->integer("for")->default(0)->comment("0=sale, 1=rent,");
            $table->integer("status")->default(1)->comment("0=soldout, 1=active");
            $table->integer("isFeatured")->default(0)->comment("0=no, 1=yes");
            $table->integer("size");
            $table->bigInteger("price");
            $table->mediumText("small_description")->nullable();
            $table->longText("description");
            $table->integer("bedrooms");
            $table->integer("bathrooms");
            $table->integer("rooms");
            $table->integer("subdistrict_id");
            $table->mediumText("address");
            $table->float("latitude")->nullable();
            $table->float("longitude")->nullable();
            $table->date("year_built");
            $table->mediumText("map_iframe");
            $table->mediumText("street_iframe");

            $table->timestamps();
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
            $table->foreign('agent_id')->references('id')->on('agents')->onDelete('cascade');
         
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
