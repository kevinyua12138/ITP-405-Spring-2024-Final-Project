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
        Schema::create('choreographies', function (Blueprint $table) {
            $table->id();
            
            $table->unsignedBigInteger('song_id');
            $table->foreign('song_id')->references('songId')->on('songs')->onDelete('cascade');
            
            $table->unsignedBigInteger('dancer1_id');
            $table->foreign('dancer1_id')->references('id')->on('users')->onDelete('cascade');

            $table->unsignedBigInteger('dancer2_id')->nullable();
            $table->foreign('dancer2_id')->references('id')->on('users')->onDelete('set null');

            $table->unsignedBigInteger('dancer3_id')->nullable();
            $table->foreign('dancer3_id')->references('id')->on('users')->onDelete('set null');

            $table->unsignedBigInteger('dancer4_id')->nullable();
            $table->foreign('dancer4_id')->references('id')->on('users')->onDelete('set null');

            $table->unsignedBigInteger('dancer5_id')->nullable();
            $table->foreign('dancer5_id')->references('id')->on('users')->onDelete('set null');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('choreographies');
    }
};
