<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //
    protected $fillable = [
        'name', 'description', 'Main category','id'
    ];
    public function categories(){
        return $this->hasMany('App\Category','parent_id');
    }
    public function services(){
        return $this->hasMany(Service::class,'category_id','id');
    }
}
