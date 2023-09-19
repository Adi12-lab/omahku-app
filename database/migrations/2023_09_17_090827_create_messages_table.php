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
        Schema::create('messages', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("receiver_id"); //user yang menerima pesan
            $table->string("subject", 50);
            $table->string("name", 50);
            $table->string("phone", 14);
            $table->string("email")->nullable();
            $table->text("message");
            $table->timestamp("read_at")->nullable();
            $table->timestamps();
            $table->foreign("receiver_id")->references("id")->on("users")->onDelete("cascade");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('messages');
    }
};
