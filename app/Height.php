<?php
/**
 * Created by PhpStorm.
 * User: Samith
 * Date: 2/22/2019
 * Time: 5:31 PM
 */

namespace App;


use Illuminate\Database\Eloquent\Model;

class Height extends Model
{

    protected  $table ='heights';
    protected  $fillable =['id','height'];

    public function inventory() {
        return $this->hasMany('App\Inventory', 'height_id', 'id');
    }

}