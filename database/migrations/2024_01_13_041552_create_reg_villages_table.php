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
        Schema::create('reg_villages', function (Blueprint $table) {
            $table->bigInteger('id')->primary();
            $table->foreignId('district_id')->constrained('reg_districts')->cascadeOnDelete();
            $table->string('name');
            $table->integer('tps')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reg_villages');
    }
};
