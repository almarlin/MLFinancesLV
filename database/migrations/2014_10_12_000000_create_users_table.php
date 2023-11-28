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
            $table->integer('ID_USER', true);
            $table->integer('NIF')->nullable();
            $table->string('NAME', 10)->nullable();
            $table->string('SURNAME', 25)->nullable();
            $table->integer('AGE')->nullable();
            $table->date('BIRTHDAY')->nullable();
            $table->string('COUNTRY',60)->nullable();
            $table->string('PROVINCE',60)->nullable();
            $table->string('CITY',60)->nullable();
            $table->integer('PC')->nullable();
            $table->string('ADDRESS',255)->nullable();
            $table->integer('PHONENUMBER')->nullable();
            $table->string('HASH', 120)->nullable();
            $table->boolean('BAN')->nullable();
            $table->boolean('ADMIN')->nullable();
            $table->string('PROFILEPHOTO', 60)->nullable();
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
