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
        Schema::create('property_floors', function (Blueprint $table) {
            $table->engine = "innoDB";
            $table->id();
            $table->unsignedBigInteger("property_id");
            $table->string("name", 25);
            $table->mediumText("description")->nullable();
            $table->integer("size");
            $table->string("image");
            $table->timestamps();
            $table->foreign("property_id")->references("id")->on("properties")->onDelete("cascade");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('property_floors');
    }
};
