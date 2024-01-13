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
        Schema::create('dapil_reg_district', function (Blueprint $table) {
            $table->foreignId('dapil_id')
                ->references('id')
                ->on('dapils')
                ->cascadeOnDelete();
            $table->foreignId('reg_district_id')
                ->references('id')
                ->on('reg_districts')
                ->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dapil_reg_district_pivot');
    }
};
