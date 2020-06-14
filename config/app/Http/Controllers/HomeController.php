<?php

namespace App\Http\Controllers;
use App\UserSubjectMap;
use Illuminate\Http\Request;
use App\User;
use App\Post;
use App\Subject;
use App\BookAppointment;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // return Post::find(1)->subject;   
        // $user = User::find(11)->usersubjectmap;
        // $appointments = BookAppointment::with('slots')->with('doctor')->get();
        // $appointments = DB::table('book_appointments')->all();
        // $slots = DB::table('slots')->get();
        $role = Auth::user()->role;
        $userId = Auth::user()->id;
        if($role == 'patient'){

            $appointments = DB::table('book_appointments')->where('patientId', '=', $userId)
                            ->where('appointmentDate', '=', Carbon::now()->format('d/m/Y'))
                            ->leftJoin('users', 'book_appointments.doctorId', '=', 'users.id')
                            ->leftJoin('slots', 'book_appointments.slotId', '=', 'slots.id')
                            ->get();
            

            $data = array('appointments' => $appointments);
            // dd($data);
        }
        else{
            $appointments = DB::table('book_appointments')
                            ->where('doctorId', '=', $userId)
                            ->where('appointmentDate', '=', Carbon::now()->format('d/m/Y'))
                            ->leftJoin('users', 'book_appointments.patientId', '=', 'users.id')
                            ->leftJoin('slots', 'book_appointments.slotId', '=', 'slots.id')
                            ->get();
            // dd($appointments);
            $data = array('appointments' => $appointments);

        }
        
        return view('home', ['appointments' => $data, 'role'=>$role]);
    }
}
