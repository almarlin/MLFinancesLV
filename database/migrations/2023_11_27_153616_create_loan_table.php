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
        Schema::create('loans', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('account_id');
            $table->date('EXPEDITIONDATE')->nullable();
            $table->float('MONTHLYPAYMENT', 10, 0)->nullable();
            $table->integer('TERMS')->nullable();
            $table->float('TOTAL', 10, 0)->nullable();
            $table->float('INTEREST', 10, 0)->nullable();
            $table->date('DUEDATE')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('loan');
    }
};
