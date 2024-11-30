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

    public function trucks(){
        return $this->hasMany(Truck::class);
    }

    public function description()
    {
        return Measure::find($this->measure_id)->description;
    }

    public function unit()
    {
        return Measure::find($this->measure_id)->unit;
    }

    /*public function minValue()
    {
        $normalValue = NormalValue::where([
            ['measure_id', '=', $this->measure_id],
            ['age_from', '<=', $this->age],
        ])->where(
            function($query) {
                return $query
                ->where('age_to', '>=', $this->age)
                ->orWhere('age_to', '=', null);
            })->get()->first();
            dd($normalValue);
        return $normalValue;
    }
        */
}