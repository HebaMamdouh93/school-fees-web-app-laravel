<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Grade extends Model
{
    protected $fillable = [
        'name',   
    ];

    //get all fees
    public function fees()
    {
        return $this->belongsToMany('App\Fee')->withPivot('year_id', 'school_id','fee_value');
    }

     //get all schools
     public function schools()
     {
         return $this->belongsToMany('App\School','fee_grade')->withPivot('year_id', 'grade_id','fee_value');
     }
}
