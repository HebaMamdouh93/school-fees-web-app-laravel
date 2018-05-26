<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fee extends Model
{
    protected $fillable = [
        'fee_type',   
    ];

    //get all grades
    public function grades()
    {
        return $this->belongsToMany('App\Grade');
    }

    //get all schools
    public function schools()
    {
        return $this->belongsToMany('App\School','fee_grade');
    }
}
