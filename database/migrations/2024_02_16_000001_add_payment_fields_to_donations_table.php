<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class AddPaymentFieldsToDonationsTable extends Migration
{
    public function up()
    {
        // First, modify the payment_mode enum
        DB::statement("ALTER TABLE donations MODIFY COLUMN payment_mode ENUM('cash', 'cheque', 'online', 'upi') NOT NULL");

        // Then add the new columns
        Schema::table('donations', function (Blueprint $table) {
            $table->string('cheque_number')->nullable()->after('bank_name');
            $table->date('cheque_date')->nullable()->after('cheque_number');
            $table->string('transaction_id')->nullable()->after('cheque_date');
            $table->dateTime('transaction_date')->nullable()->after('transaction_id');
            
            // Add soft deletes
            $table->softDeletes();
        });

        // Update existing records
        DB::statement("UPDATE donations SET payment_mode = 'online' WHERE payment_mode = 'rtgs'");
    }

    public function down()
    {
        // First revert the payment_mode enum
        DB::statement("ALTER TABLE donations MODIFY COLUMN payment_mode ENUM('online', 'rtgs', 'cash') NOT NULL");

        // Then remove the added columns
        Schema::table('donations', function (Blueprint $table) {
            $table->dropColumn([
                'cheque_number',
                'cheque_date',
                'transaction_id',
                'transaction_date',
                'deleted_at'
            ]);
        });

        // Update records back
        DB::statement("UPDATE donations SET payment_mode = 'rtgs' WHERE payment_mode = 'online'");
    }
}
