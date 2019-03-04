<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Library\LogData;

class Role extends Model
{
    public $timestamps = false;


     protected $fillable =['id','role'];

    public function users(){
        return $this->belongsToMany('App\User');
    }


}
