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
        Schema::create('account_loan', function (Blueprint $table) {
            $table->integer('ID_ACCOUNT')->nullable()->index('ID_ACCOUNT');
            $table->integer('ID_LOAN')->nullable()->index('ID_LOAN');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('account_loan');
    }
};
