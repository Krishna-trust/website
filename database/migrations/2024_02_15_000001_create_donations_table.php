<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDonationsTable extends Migration
{
    public function up()
    {
        Schema::create('donations', function (Blueprint $table) {
            $table->id();
            $table->string('receipt_number')->unique()->nullable();
            $table->string('full_name');
            $table->string('mobile_number', 10)->nullable();
            $table->text('address')->nullable();
            $table->decimal('amount', 10, 2);
            $table->string('donation_for')->nullable();
            $table->text('comment')->nullable();
            $table->string('pan_number')->nullable();
            $table->enum('payment_mode', ['online', 'rtgs', 'cash']);
            $table->string('bank_name')->nullable();
            $table->date('date')->nullable();;
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('donations');
    }
}
