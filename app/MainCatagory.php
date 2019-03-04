<?php
/**
 * Created by PhpStorm.
 * User: Samith
 * Date: 2/12/2019
 * Time: 2:29 PM
 */

namespace App;


use Illuminate\Database\Eloquent\Model;

class MainCatagory extends  Model
{

    protected  $table ='maincategories';
    protected  $fillable =['id','category','created_at','updated_at'];

    public function subcategory() {
        return $this->hasMany('App\SubCategory', 'mainCategoryId', 'id');
    }

}