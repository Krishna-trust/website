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
            // i need to add location fields as letitude and longitude
            $table->decimal('latitude', 10, 8)->after('address')->nullable();
            $table->decimal('longitude', 10, 8)->after('latitude')->nullable();
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
            //
        });
    }
};
