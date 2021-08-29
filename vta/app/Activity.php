<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{

    protected $fillable = ['category_id','title'];
    public function category()
    {
        return $this->belongsTo('App\Category');
    }


    public function transaction()
    {
        return $this->hasMany('App\Transaction');
    }
}
