<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $fillable = ['activity_id','programe','advance','advance_date','settlement','settlement_date','file_no'];
    public function activity()
    {
        return $this->belongsTo('App\Activity');
    }


}
