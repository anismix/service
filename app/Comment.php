<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Service;
class Comment extends Model
{
    public function  user(){
        return $this->belongsTo(User::class);
    }
    public function service(){
        return $this->belongsTo(Service::class);
    }
    public function commentable(){
           return $this->morphTo();
    }
    public function comments(){
        return $this->morphMany('App\commentaire','commentable')->latest();
    }
    //
}
