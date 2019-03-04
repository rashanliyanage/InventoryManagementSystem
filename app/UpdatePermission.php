<?php
/**
 * Created by PhpStorm.
 * User: Samith
 * Date: 3/4/2019
 * Time: 3:33 PM
 */

namespace App;


use Illuminate\Database\Eloquent\Model;

class UpdatePermission extends Model
{

    protected $table ='update_permissions';
    protected $fillable =['id','user_id','approved_user','reason','password','is_approved','approved_time','expire_time','created_at','updated_at'];

    public function users(){
        return $this->belongsTo('App\User','user_id');
    }

    public function approvedUser(){
        return $this->belongsTo('App\User','approved_user');
    }
}