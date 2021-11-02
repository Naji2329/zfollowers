<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable=['service_id','user_id','username','payment_method','price','url','instagram_username','email','status'];



   
}


