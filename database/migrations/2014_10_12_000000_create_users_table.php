<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('username')->unique()->nullable();
            $table->string('email')->unique()->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->enum('status', [
                'pengurus', 'anggota', 'relawan', 'system', 'saksi'
            ])->default('anggota');
            $table->string('ftitle')->nullable();
            $table->string('btitle')->nullable();
            $table->integer('number')->nullable();
            $table->string('place_birth')->nullable();
            $table->string('date_birth')->nullable();
            $table->string('phone')->nullable();
            $table->enum('gender', [
                'laki-laki', 'perempuan'
            ])->nullable();
            $table->enum('marriage', [
                'belum kawin', 'kawin', 'cerai hidup', 'cerai mati'
            ])->nullable();
            $table->string('job')->nullable();
            $table->string('hobby')->nullable();
            $table->string('blood')->nullable();
            $table->enum('last_education', [
                'tidak sekolah', 'SD', 'SMP', 'SMA/SMK', 'diploma', 'sarjana', 'magister', 'doktor'
            ])->nullable();
            $table->string('address')->nullable();
            $table->integer('province_id')->nullable();
            $table->integer('regency_id')->nullable();
            $table->integer('district_id')->nullable();
            $table->bigInteger('village_id')->nullable();
            $table->integer('rw')->nullable();
            $table->integer('rt')->nullable();
            $table->integer('tps')->nullable();
            $table->boolean('disabilitas')->default(false);
            $table->string('description')->nullable();
            $table->string('ktp_photo')->nullable();
            $table->string('position_id')->nullable();
            $table->integer('type_unit')->nullable();
            $table->string('unit_id')->nullable();
            $table->string('facebook')->nullable();
            $table->string('instagram')->nullable();
            $table->string('tiktok')->nullable();
            $table->string('phone_type')->nullable();
            $table->string('phone_os')->nullable();
            $table->boolean('is_active')->default(true);
            $table->integer('referal_id')->nullable();
            $table->foreignId('current_team_id')->nullable();
            $table->string('profile_photo_path', 2048)->nullable();
            $table->integer('created_by')->nullable();
            $table->integer('updated_by')->nullable();
            $table->timestamps();
            $table->softDeletes('deleted_at');
            $table->float('latitude', 17, 14)->nullable();
            $table->float('longitude', 17, 14)->nullable();
            $table->string('location')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
