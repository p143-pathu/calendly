@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card-header">{{__('Book Appointment')}}</div>

                <div class="card-body">
                    <form method="post" action="/bookAppointment">
                        @csrf
                        <div class="form-group row">
                            <label for="doctor" class="col-md-4 col-form-label text-md-right">{{__('Doctor Name')}}</label>
                            <div class="col-md-7">
                                <select name="doctor" class="form-control" id="doctor" required>
                                    <option value="0">--Choose Doctor--</option>
                                    @foreach($doctors as $doctor)
                                        <option value="{{ $doctor->id }}">{{$doctor->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <!-- <div class="form-group row">
                            <label for="date" class="col-md-4 col-form-label text-md-right">{{__('Date')}}</label> -->
                            <!-- <div class="col-md-7">
                                <input type="date" hidden="true" id="datepicker" class="form-control" name="appointmentDate">    
                            </div> -->
                        <!-- </div> -->
                        <input type="text" hidden="true" id="datepicker" class="form-control" name="appointmentDate">    

                        <div class="form-group row">
                            <label for="slot" class="col-md-4 col-form-label text-md-right">{{__('Slot')}}</label>
                            <div class="col-md-7">
                                <select class="form-control" name="slot" id="slot" required>
                                    <option value="">--Choose Slot--</option>
                                </select>
                            </div>
                        </div>
                        
                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <input type="submit" class="btn btn-primary col-md-4" value="Book Appointment"> &nbsp&nbsp&nbsp&nbsp&nbsp 
                                <input type="reset" class="btn btn-danger col-md-4" value="Reset">  
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.6/jquery.js" type="text/javascript"></script>

<script type="text/javascript">
    $(document).ready(function(){
        
        $("#doctor").change(function(){
            var doctorId = $("#doctor").val();
            var today = new Date();
            $("#datepicker").val(today);
            $.ajax({
                url: "{!! URL::to('fetchdates') !!}",
                type: "get",
                data : {
                    doctorId: doctorId,
                    date: today
                },
                success: function(data){
                    slotHTML = "<option value=''>Choose Section</option>";
                    $.each(data, function(slotId, slot)
                    {
                        slotHTML += "<option value='"+slotId+"'>"+slot+"</option>";
                    });
                    $("#slot").html(slotHTML);
                }
            });
        });

        
       
    
    });
</script>