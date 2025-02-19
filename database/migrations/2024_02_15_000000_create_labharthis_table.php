<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLabharthisTable extends Migration
{
    public function up()
    {
        Schema::create('labharthi_form', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->text('address')->nullable();
            $table->string('native_place')->nullable();
            $table->string('cast')->nullable();
            $table->string('sub_cast')->nullable();
            $table->string('adhar_number', 12)->nullable();
            $table->string('mobile_number', 10)->nullable();
            $table->enum('category', ['vidhva', 'vidhur', 'rejected'])->nullable();
            $table->string('work')->nullable();
            $table->string('identification_mark')->nullable();
            $table->text('income_source')->nullable();
            $table->text('property')->nullable();
            $table->text('reasion_for_not_working')->nullable();
            $table->text('reasion_for_tifin')->nullable();
            $table->text('comment_from_trust')->nullable();
            $table->date('tifin_starting_date')->nullable();
            $table->date('tifin_ending_date')->nullable();
            $table->string('reasion_for_tifin_stop')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('labharthi_form');
    }
}
