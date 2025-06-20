<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    use HasFactory;

    protected $fillable = [
        'labharthi_id',
        'attendance',
        'attendance_date',
    ];

    public function labharthi()
    {
        return $this->belongsTo(Labharthi::class);
    }
}
