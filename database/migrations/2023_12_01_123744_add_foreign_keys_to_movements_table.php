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
        Schema::table('movements', function (Blueprint $table) {
            $table->foreign('ID_FROMACCOUNT')->references('id')->on('accounts');
            $table->foreign('ID_TOACCOUNT')->references('id')->on('accounts');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('movements', function (Blueprint $table) {
            $table->dropForeign('ID_FROMACCOUNT');
            $table->dropForeign('ID_TOACCOUNT');

        });
    }
};
