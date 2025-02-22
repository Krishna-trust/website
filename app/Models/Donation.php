<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Donation extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $fillable = [
        'receipt_number',
        'date',
        'full_name',
        'mobile_number',
        'address',
        'amount',
        'donation_for',
        'comment',
        'pan_number',
        'payment_mode',
        'bank_name',
        'cheque_number',
        'cheque_date',
        'transaction_id',
        'transaction_date'
    ];

    // protected $casts = [
    //     'date' => 'date',
    //     'amount' => 'decimal:2',
    //     'cheque_date' => 'date',
    //     'transaction_date' => 'datetime'
    // ];

    // protected $dates = [
    //     'deleted_at'
    // ];
}
