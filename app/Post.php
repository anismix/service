<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //
    public function comments(){
        return $this->morphMany('App\Comment','commentable')->latest();
    }
    public function service(){
        return $this->belongsTo(Service::class,'service_id');
    }

}
