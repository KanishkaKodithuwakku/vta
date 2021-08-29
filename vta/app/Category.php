<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
   protected $fillable = ['project_id','title','description'];
   //protected $table = 'categories';
    public function project()
    {
        return $this->belongsTo('App\Project');
    }

    public function activities()
    {
        return $this->hasMany('App\Activity');
    }
}
