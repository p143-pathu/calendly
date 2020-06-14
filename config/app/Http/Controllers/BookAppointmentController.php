<?php

namespace App\Http\Controllers;

use Auth;
use App\BookAppointment;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\DB;
use App\Slot;
use Carbon\Carbon;
class BookAppointmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $role = Auth::user()->role;
        if($role == 'doctor'){
            return redirect('/home');
        }
        $doctors = DB::table('users')->where('role', '=', 'doctor')->get();
        $slots = DB::table('slots')->get();
        return view('bookAppointment.create', compact('doctors', 'slots'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->request->all();
        $user = Auth::user();
        $userId = $user->id;
        BookAppointment::create([
            'doctorId' => $data['doctor'],
            'patientId' => $userId,
            'appointmentDate' => Carbon::now()->format('d/m/Y'),
            'slotId' => $data['slot']
        ]);
        return redirect('/');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\BookAppointment  $bookAppointment
     * @return \Illuminate\Http\Response
     */
    public function show(BookAppointment $bookAppointment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\BookAppointment  $bookAppointment
     * @return \Illuminate\Http\Response
     */
    public function edit(BookAppointment $bookAppointment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\BookAppointment  $bookAppointment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BookAppointment $bookAppointment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\BookAppointment  $bookAppointment
     * @return \Illuminate\Http\Response
     */
    public function destroy(BookAppointment $bookAppointment)
    {
        //
    }
}
