<?php
/**
 * Created by PhpStorm.
 * User: Samith
 * Date: 2/12/2019
 * Time: 2:33 PM
 */

namespace App;


use Illuminate\Database\Eloquent\Model;

class SubCategory extends  Model
{

    protected  $table ='subcategories';
    protected $fillable =['id','mainCategoryId','category','created_at','updated_at'];

    public function maincategory(){
      return   $this->belongsTo('App\MainCatagory','mainCategoryId');
    }

    public function items(){
        return $this->hasMany('App\Item');
    }

}