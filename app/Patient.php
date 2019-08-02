<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    //

    public function disease(){
        return $this->belongsTo('App\Specialty','specialty_id');
    }
}

