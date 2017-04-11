<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{


    public function responce(){

        return $this->hasMany('App\Responce');
    }
}
