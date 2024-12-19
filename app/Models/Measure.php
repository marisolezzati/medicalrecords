<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Measure extends Model
{
    protected $fillable = [
        'description',
        'unit',
    ];

    public function normalValues()
    {
        return $this->belongsToMany(NormalValue::class);
    }

    public function normalValuesText()
    {
        $text = "";
            
        foreach(NormalValue::where('measure_id', $this->id)->get() as $r){
            //Age is in months, calculate years if more than 12.
            if($text!=""){
                $text .= ", ";
            }
            $text .= "From ".$this->yearMonthText($r['age_from']);
            if(!is_null($r['age_to'])){
                $text .= " to ".$this->yearMonthText($r['age_to']);
            }
            $text .= ": ";
            if(is_null($r['min_value'])){
                $text .= "<".$r['max_value'];
            }
            else{
                    if(is_null($r['max_value'])){
                        $text .= ">".$r['min_value'];
                    }
                    else{
                        $text .= $r['min_value']." - ".$r['max_value'];
                    }
            }
        }
            
        return $text;
    }

    private function yearMonthText($months){
        $ageYears = floor($months/12);
        $ageMonths = $months%12;
        $text = "";
        if($ageYears>0){
            $text .= $ageYears." years ";
        }
        if($ageMonths>0 || $ageYears==0){
            $text .= $ageMonths." months ";
        }
        return $text;
    }
}
