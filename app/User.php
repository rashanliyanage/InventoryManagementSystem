<?php

namespace App;
use App\Notifications\WelcomeNotification;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
       'role_id','branch_id','name', 'email', 'password','remember_token','status','created_at','updated_at'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function role() {
        return $this->belongsTo('App\Role');
    }

    public function branch() {
        return $this->belongsTo('App\Branch');
    }

    public function sendWelcomeMessage($data){
        return $this->notify( new WelcomeNotification( array( 'name' => $this->name , 'data' => $data )));
    }

    public function inventory() {
        return $this->hasMany('App\Inventory', 'user_id', 'id');
    }

    public function inventory_logs(){
        return $this->hasMany('App\InventoryLogs','user_id','id');
    }

    public function permission(){
        return $this->hasMany('App\UpdatePermission');
    }
}
