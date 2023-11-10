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
        Schema::create('danhgia', function (Blueprint $table) {
            $table->id('id_DG');
            $table->string('ten_tieu_chi', 255);
            $table->integer('diem')->default(0);
            $table->integer('diemQuyDinh')->default(0);
            $table->text('link')->nullable();
            $table->string('ghiChu', 255)->nullable();
            $table->dateTime('date')->nullable();
            $table->unsignedBigInteger('id_TC')->nullable();            
            $table->unsignedBigInteger('id_DDG');            
            $table->foreign('id_TC')->references('id_TC')->on('tieuchi');
            $table->foreign('id_DDG')->references('id_DDG')->on('dotdanhgia');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('danhgia');
    }
};
