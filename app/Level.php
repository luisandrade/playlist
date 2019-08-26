<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Heroe;

class Level extends Model
{
    protected $table="levels"; 

    public function heroe(){
        return $this->hasToMany('App\Heroe');
    }
    
}
