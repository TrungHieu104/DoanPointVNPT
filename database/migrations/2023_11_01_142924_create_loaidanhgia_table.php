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
        Schema::create('loaidanhgia', function (Blueprint $table) {
            $table->id('id_LDG');
            $table->unsignedBigInteger('id_thang')->nullable();            
            $table->unsignedBigInteger('id_quy')->nullable();            
            $table->unsignedBigInteger('id_nam');            
            $table->foreign('id_thang')->references('id_thang')->on('thang');
            $table->foreign('id_quy')->references('id_quy')->on('quy');
            $table->foreign('id_nam')->references('id_nam')->on('nam');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('loaidanhgia');
    }
};
