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
        return $this->belongsToMany('App\Fee');
    }
}
