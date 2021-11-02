<?php

namespace App;


use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
// use Spatie\Permission\Traits\HasRoles;
class Admin extends Authenticatable
{
    //  use Notifiable,HasRoles;
     protected $guard_name=["web",'admin'];

    protected $fillable = [
        'name', 'email', 'password','avatar'
    ];



     protected $hidden = [
        'password', 'remember_token',
    ];

}
