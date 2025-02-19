<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Labharthi extends Model
{
    protected $table = 'labharthi_form';
    
    protected $fillable = [
        'name',
        'address',
        'native_place',
        'cast',
        'sub_cast',
        'adhar_number',
        'mobile_number',
        'category',
        'work',
        'identification_mark',
        'income_source',
        'property',
        'reasion_for_not_working',
        'reasion_for_tifin',
        'comment_from_trust',
        'tifin_starting_date',
        'tifin_ending_date',
        'reasion_for_tifin_stop'
    ];

    protected $casts = [
        'tifin_starting_date' => 'date',
        'tifin_ending_date' => 'date',
    ];
}
