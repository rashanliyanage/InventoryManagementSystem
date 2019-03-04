<?php
/**
 * Created by PhpStorm.
 * User: Samith
 * Date: 2/22/2019
 * Time: 5:34 PM
 */

namespace App;


use Illuminate\Database\Eloquent\Model;

class PotSize extends  Model
{
    protected  $table ='pot_sizes';
    protected  $fillable =['id','pot_size'];

    public function inventory() {
        return $this->hasMany('App\Inventory', 'pot_id', 'id');
    }

}