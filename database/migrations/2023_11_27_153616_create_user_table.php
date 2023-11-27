<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user', function (Blueprint $table) {
            $table->integer('ID_USER', true);
            $table->integer('NIF')->nullable();
            $table->string('NAME', 10)->nullable();
            $table->string('SURNAME', 25)->nullable();
            $table->integer('AGE')->nullable();
            $table->string('HASH', 120)->nullable();
            $table->boolean('BAN')->nullable();
            $table->boolean('ADMIN')->nullable();
            $table->string('PROFILEPHOTO', 60)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user');
    }
};
