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
        Schema::create('movements', function (Blueprint $table) {
            $table->integer('id',true);
            $table->integer('account_id')->nullable();
            $table->integer('toaccount_id')->nullable();
            $table->string('fromIBAN',255)->nullable();
            $table->string('toIBAN',255)->nullable();
            $table->string('CONCEPT', 60)->nullable();
            $table->integer('QUANTITY')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('movements');
    }
};
