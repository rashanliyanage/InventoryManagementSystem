<?php
/**
 * Created by PhpStorm.
 * User: Samith
 * Date: 2/24/2019
 * Time: 11:53 AM
 */

namespace App;


use Illuminate\Database\Eloquent\Model;

class InventoryLogs extends Model
{
    protected $table ='inventory_logs';
    protected $fillable =['user_id','inventory_id','description','previous_quantity','new_quantity','created_at','updated_at'];

    public function inventory() {
        return $this->belongsTo('App\Inventory','inventory_id');
    }

    public function user() {
        return $this->belongsTo('App\User','user_id');
    }

}