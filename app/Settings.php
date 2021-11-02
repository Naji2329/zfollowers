<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Settings extends Model
{
    protected $fillable=['site_name','logo','welcome_message','address','instagram_url',
    'email','phone','app_store','play_store','paypal_base_uri','paypal_client_id','paypal_client_secret'];
}

