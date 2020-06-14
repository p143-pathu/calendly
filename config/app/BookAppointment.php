<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Slot;
use App\User;
class BookAppointment extends Model
{
    //
    protected $fillable = ['doctorId', 'patientId', 'appointmentDate', 'slotId'];
    public function slots(){
        return $this->hasMany(Slot::class, 'id', 'slotId');
    } 
    public function doctor(){
        return $this->hasOne(User::class, 'id', 'doctorId');
    }
}
