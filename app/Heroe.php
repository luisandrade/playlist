<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Levels;

class Heroe extends Model
{
    protected $table="heroes"; 

    public function level(){
        return $this->belongsTo('App\Levels');
    }
}
