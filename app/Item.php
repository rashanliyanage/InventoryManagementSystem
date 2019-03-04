<?php
/**
 * Created by PhpStorm.
 * User: Samith
 * Date: 2/13/2019
 * Time: 9:55 PM
 */

namespace App;


use Illuminate\Database\Eloquent\Model;

class Item extends Model
{

    protected  $table ='items';
    protected  $fillable =['id','sub_category_id','name','bot_name','min_order_level','created_at','img_path','updated_at'];

    public function subCategoryId(){
        return $this->belongsTo('App\SubCategory','	sub_category_id');
    }

}