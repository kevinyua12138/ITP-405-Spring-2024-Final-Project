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
            
            $table->unsignedBigInteger('songId');
            $table->foreign('songId')->references('songId')->on('songs')->onDelete('cascade');
            
            $table->unsignedBigInteger('dancer1_id');
            $table->foreign('dancer1_id')->references('id')->on('users')->onDelete('cascade');
            $table->double('dancer1_x')->nullable();
            $table->double('dancer1_y')->nullable();

            $table->unsignedBigInteger('dancer2_id');
            $table->foreign('dancer2_id')->references('id')->on('users')->onDelete('cascade');
            $table->double('dancer2_x')->nullable();
            $table->double('dancer2_y')->nullable();

            $table->unsignedBigInteger('dancer3_id');
            $table->foreign('dancer3_id')->references('id')->on('users')->onDelete('cascade');
            $table->double('dancer3_x')->nullable();
            $table->double('dancer3_y')->nullable();

            $table->unsignedBigInteger('dancer4_id');
            $table->foreign('dancer4_id')->references('id')->on('users')->onDelete('cascade');
            $table->double('dancer4_x')->nullable();
            $table->double('dancer4_y')->nullable();

            $table->unsignedBigInteger('dancer5_id');
            $table->foreign('dancer5_id')->references('id')->on('users')->onDelete('cascade');
            $table->double('dancer5_x')->nullable();
            $table->double('dancer5_y')->nullable();

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
