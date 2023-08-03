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
        Schema::create('users', function (Blueprint $table) {
            $table->id();

            $table->string('usertype')->nullable()->comment('Student or Admin or Employee');
            $table->string('name')->nullable();
            $table->string('email')->unique()->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');

            $table->string('mobile')->nullable();
            $table->string('address')->nullable();
            $table->string('gender')->nullable();
            $table->string('image')->nullable();
            $table->string('fname')->nullable()->comment('Father Name');
            $table->string('mname')->nullable()->comment('Mother Name');
            $table->string('religion')->nullable()->comment('Religion');
            $table->string('id_no')->nullable()->comment('ID number');
            $table->date('dob')->nullable()->comment('Date of Birth');
            $table->string('code')->nullable()->comment('Para generar user password');
            $table->string('role')->nullable()->comment('admin: head of software, operator: computer operator, user: employee');
            $table->date('join_date')->nullable();
            $table->integer('designation_id')->nullable();
            $table->double('salary')->nullable();
            $table->boolean('status')->default(1)->comment('0: Inactive, 1: Active');

            $table->rememberToken();
            $table->foreignId('current_team_id')->nullable();
            $table->string('profile_photo_path', 2048)->nullable();

            $table->timestamps();
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
