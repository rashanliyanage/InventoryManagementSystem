<?php
/**
 * Created by PhpStorm.
 * User: Samith
 * Date: 2/2/2019
 * Time: 4:56 PM
 */

namespace App;


use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
    protected $fillable =['id','branch'];

    public function users(){
        return $this->belongsToMany('App\User');
    }

}