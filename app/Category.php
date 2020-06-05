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
}
