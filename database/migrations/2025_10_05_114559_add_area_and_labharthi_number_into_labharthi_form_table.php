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
            $table->string('labharthi_number')->nullable()->after('id');
            $table->foreignId('area_id')->nullable()->after('name')->constrained('area');
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
            $table->dropForeign(['area_id']);
            $table->dropColumn(['area_id', 'labharthi_number']);
        });
    }
};
