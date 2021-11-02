<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $fillable=['title','slug','quantity',
    'discount','desc','price','cat_id','parent_id','status'];

    public function cat(){
        return $this->belongsTo(Cat::class);
    }
    public function parent(){
        return $this->belongsTo(Cat::class);
    }
}


    