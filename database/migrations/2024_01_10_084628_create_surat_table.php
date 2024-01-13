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
        Schema::create('surat', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('tps');
            $table->unsignedBigInteger('village_id');
            $table->unsignedBigInteger('district_id');
            $table->unsignedBigInteger('regency_id');
            $table->unsignedBigInteger('province_id');
            $table->unsignedBigInteger('dapil_id');
            $table->unsignedBigInteger('category_id');
            $table->timestamp('timestamp');
            $table->unsignedBigInteger('created_by');
            $table->unsignedBigInteger('suara_sah');
            $table->unsignedBigInteger('suara_tdksah');
            $table->unsignedBigInteger('total_suara');
            $table->unsignedBigInteger('versioning');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('surat');
    }
};
