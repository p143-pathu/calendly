<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\BookAppointment;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use App\Slot;

class AjaxController extends Controller
{
    public function fetchdates(Request $request){
        $doctorId = $request->doctorId;
        // $user = User::find($doctorId)->slots;
        // $freeSlots = explode(",",$user->freeslots);
        $slots = Slot::all();
        $totalSlots = [];
        for($i=0; $i<count($slots); $i++){
            $totalSlots[$slots[$i]->id] = $slots[$i]->slot;
        }
        $date = Carbon::now()->format('d/m/Y');
        $slots  = DB::table('book_appointments')
                            ->where('doctorId', '=', $doctorId)
                            ->where('appointmentDate', '=', $date)->get();
        $bookedSlots = [];
        for($i=0; $i<count($slots); $i++){
            $bookedSlots[$i] = array($slots[$i])[0]->slotId;
            
        }
        // $freeslots = array_diff_assoc($totalSlots, $bookedSlots);
        $freeSlots = [];
        for($i=0; $i<count($bookedSlots); $i++){
            if(array_key_exists($bookedSlots[$i], $totalSlots)){
                array_push($freeSlots, $totalSlots[$bookedSlots[$i]]);
            }
        }
        return array_diff($totalSlots, $freeSlots );
    }
}
