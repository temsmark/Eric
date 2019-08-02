<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Refer extends Model
{
    public  function patient(){
        return $this->belongsTo('App\Patient');
    }
    public  function  disease(){
        return $this->belongsTo('App\Specialty','speciality_id');
    }
}
