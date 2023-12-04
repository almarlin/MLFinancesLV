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

            $table->integer('id',true);
            $table->integer('NIF');
            $table->string('NAME', 60)->nullable();
            $table->string('SURNAME', 25)->nullable();
            $table->string('email')->nullable();
            $table->integer('AGE')->nullable();
            $table->date('BIRTHDAY')->nullable();
            $table->string('COUNTRY',60)->nullable();
            $table->string('PROVINCE',60)->nullable();
            $table->string('CITY',60)->nullable();
            $table->integer('PC')->nullable();
            $table->string('ADDRESS',255)->nullable();
            $table->integer('PHONENUMBER')->nullable();
            $table->string('password');
            $table->boolean('BAN')->nullable();
            $table->boolean('ADMIN')->nullable();
            $table->string('PROFILEPHOTO', 60)->nullable();
            $table->rememberToken();
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
