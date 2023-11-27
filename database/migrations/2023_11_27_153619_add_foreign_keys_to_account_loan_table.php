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
        Schema::table('account_loan', function (Blueprint $table) {
            $table->foreign(['ID_ACCOUNT'], 'account_loan_ibfk_1')->references(['ID_ACCOUNT'])->on('account');
            $table->foreign(['ID_LOAN'], 'account_loan_ibfk_2')->references(['ID_LOAN'])->on('loan');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('account_loan', function (Blueprint $table) {
            $table->dropForeign('account_loan_ibfk_1');
            $table->dropForeign('account_loan_ibfk_2');
        });
    }
};
