<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{

    protected $fillable = ['title','description'];


    public function categories()
    {
        return $this->hasMany('App\Category');
    }
}
