<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class School extends Model
{
    protected $fillable = [
        'name',   
    ];

     //get all grades
      public function grades()
     {
         return $this->belongsToMany('App\Grade','fee_grade')->withPivot('year_id', 'fee_id','fee_value');
     }

     //get all fees
     public function fees()
     {
         return $this->belongsToMany('App\Fee','fee_grade')->withPivot('year_id', 'grade_id','fee_value');
         
     } 

    
}
