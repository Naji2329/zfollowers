<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cat extends Model
{
    protected $fillable=['name','cat_id','slug','text','content','example_link'];

    public function cat(){
        return $this->belongsTo(Cat::class);
    }
    public function cats(){
        return $this->hasMany(Cat::class);
    }
}
