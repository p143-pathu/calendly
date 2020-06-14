<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Slot extends Model
{
    public function doctor(){
        return $this->belongsTo('App\User', 'doctorId');
    }
}
