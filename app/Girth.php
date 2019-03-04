<?php
/**
 * Created by PhpStorm.
 * User: Samith
 * Date: 2/22/2019
 * Time: 5:38 PM
 */

namespace App;


use Illuminate\Database\Eloquent\Model;

class Girth extends Model
{
    protected  $table ='girth';
    protected  $fillable =['id','girth'];

    public function inventory() {
        return $this->hasMany('App\Inventory', 'girth_id', 'id');
    }
}