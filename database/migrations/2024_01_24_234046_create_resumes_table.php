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
        Schema::create('resumes', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->enum('type', [
                'education',
                'job',
                'organization',
                'certification'
            ]);
            $table->string('title')->nullable();
            $table->string('institution');
            $table->string('date_start')->nullable();
            $table->string('date_end')->nullable();
            $table->string('year')->nullable();
            $table->string('description')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('resumes');
    }
};
