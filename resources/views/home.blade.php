@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Today's Appointment</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    
                    @if(count($appointments['appointments']) <= 0)
                        No Appointment
                    
                    @else
                        <table>
                            <tr>
                                @if($role == 'doctor')
                                <th> Patient Name</th>
                                @else
                                <th>Doctor Name</th>
                                @endif
                                <th> Date </th>
                                <th> Slot </th>
                            </tr>
                            @foreach($appointments['appointments'] as $appointment)

                                <tr>
                                <!-- <input type="hidden" name="appointments[]" value="{{serialize($appointment)}}"> -->
                                    <td>{{$appointment->name}}</td>
                                    <td>{{$appointment->appointmentDate}}</td>
                                    <td>{{$appointment->slot}}
                                </tr> 

                            @endforeach
                        </table>


                    @endif

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
