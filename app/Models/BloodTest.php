<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BloodTest extends Model
{
    protected $fillable = [
        'value',
        'measure_id',
        'user_id',
        'age',
    ];
}
