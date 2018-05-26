<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fee_grade extends Model
{
    protected $table = 'fee_grade';
    protected $fillable = [
        'grade_id', 
        'fee_id',
        'school_id',
        'year_id',
        'fee_value'  
    ];
}
