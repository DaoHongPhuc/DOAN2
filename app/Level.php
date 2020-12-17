<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Level extends Model
{
    protected $table = "level";

    public function post()
    {
        return $this->hasMany('App\Posts');
    }

   
}
