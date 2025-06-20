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
        Schema::table('labharthi_form', function (Blueprint $table) {
            $table->tinyInteger('status')->default(1)->after('reasion_for_tifin_stop');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('labharthi_form', function (Blueprint $table) {
            $table->dropColumn('status');
        });
    }
};
