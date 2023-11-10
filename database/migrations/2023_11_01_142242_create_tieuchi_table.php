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
        Schema::create('tieuchi', function (Blueprint $table) {
            $table->id('id_TC');
            $table->string('ten', 255);
            $table->integer('diemQuyDinh')->default(0);
            $table->unsignedBigInteger('id_CQ');            
            $table->foreign('id_CQ')->references('id_CQ')->on('coquan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tieuchi');
    }
};
