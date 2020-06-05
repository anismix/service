<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Category;
class Service extends Model
{
    //
    public function category(){
        return $this->belongsTo('App\Category','category_id');
    }

}
