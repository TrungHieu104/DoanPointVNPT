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
        Schema::create('coquan', function (Blueprint $table) {
            $table->id('id_CQ');
            $table->string('ten', 255);
            $table->string('diaChi', 255);
            $table->string('email', 50);
            $table->string('phone', 11);
            $table->unsignedInteger('parent_CQ')->default(0);            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('coquan');
    }
};
