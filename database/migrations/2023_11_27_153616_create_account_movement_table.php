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
        Schema::create('account_movement', function (Blueprint $table) {
            $table->integer('ID_ACCOUNT')->nullable()->index('ID_ACCOUNT');
            $table->integer('ID_MOVEMENT')->nullable()->index('ID_MOVEMENT');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('account_movement');
    }
};
