<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Canal extends Model
{
   
    protected $table = 'canales';
    protected $fillable = [ 'nombre_canal', 'id'];

    public function canal()
     {
         return $this->hasMany('App\Playlist');
     }


}

