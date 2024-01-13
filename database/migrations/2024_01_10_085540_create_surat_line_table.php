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
        Schema::create('surat_line', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('partai_id');
            $table->unsignedBigInteger('calon_id');
            $table->integer('suara');
            $table->unsignedBigInteger('surat_id');
            $table->enum('type', ['partai', 'total']);
            $table->timestamps();

            $table->index(['surat_id']);
            // $table->foreign('partai_id')->references('id')->on('partai');
            // $table->foreign('calon_id')->references('id')->on('calon');
            $table->foreign('surat_id')->references('id')->on('surat');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('surat_line');
    }
};
