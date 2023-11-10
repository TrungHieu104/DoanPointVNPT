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
        Schema::create('dotdanhgia', function (Blueprint $table) {
            $table->id('id_DDG');
            $table->string('tenDot',255);
            $table->boolean('trangThai')->default(0);
            $table->string('ghiChu',255)->nullable();
            $table->dateTime('date')->nullable();
            $table->unsignedBigInteger('id_CQ');            
            $table->unsignedBigInteger('id_ND');            
            $table->unsignedBigInteger('id_LDG');            
            $table->foreign('id_CQ')->references('id_CQ')->on('coquan');
            $table->foreign('id_ND')->references('id')->on('users');
            $table->foreign('id_LDG')->references('id_LDG')->on('loaidanhgia');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dotdanhgia');
    }
};
