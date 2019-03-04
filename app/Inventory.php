<?php
/**
 * Created by PhpStorm.
 * User: Samith
 * Date: 2/24/2019
 * Time: 11:26 AM
 */

namespace App;


use Illuminate\Database\Eloquent\Model;

class Inventory extends Model
{
  protected $table ='inventory';
  protected $fillable =['item_id','branch_id','height_id','pot_size_id','girth_id','quantity','previous_quantity','finally_edited_user','min_order_level','created_at','updated_at'];


    public function item() {
        return $this->belongsTo('App\Item','item_id');
    }
    public function branch() {
        return $this->belongsTo('App\Branch','branch_id');
    }
    public function height() {
        return $this->belongsTo('App\Height','height_id');
    }
    public function potSize() {
        return $this->belongsTo('App\potSize','pot_size_id');
    }
    public function girth() {
        return $this->belongsTo('App\Girth','girth_id');
    }
    public function user() {
        return $this->belongsTo('App\User','user_id');
    }


    public function inventory_logs(){
        return $this->hasMany('App\InventoryLogs','inventory_id','id');
    }

}