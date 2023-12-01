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
        Schema::table('user_accounts', function (Blueprint $table) {
            $table->foreign(['ID_USER'], 'user_account_ibfk_1')->references(['id'])->on('users');
            $table->foreign(['ID_ACCOUNT'], 'user_account_ibfk_2')->references(['id'])->on('accounts');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('user_accounts', function (Blueprint $table) {
            $table->dropForeign('user_account_ibfk_1');
            $table->dropForeign('user_account_ibfk_2');
        });
    }
};
