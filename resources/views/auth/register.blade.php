@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>
                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        
                        <div class="form-group row">
                            <label for="roles" class="col-md-4 col-form-label text-md-right">{{__('Role')}}</label>

                            <div class="col-md-6" >
                                <input type="radio" value="doctor" name="role" >Doctor&nbsp
                                <input type="radio" value="patient" name="role">Patient
                            </div>
                        </div>

                        <div class="form-group row" id="slots">
                            <label for="role" class="col-md-4 col-form-label text-md-right">{{__('Free Days')}}</label>
                            <div class="col-md-8">
                                
                                <input type="checkbox" value="0" name="slots[]">Sunday
                                <input type="checkbox" value="1" name="slots[]">Monday
                                <input type="checkbox" value="2" name="slots[]">Tuesday<br>
                                <input type="checkbox" value="3" name="slots[]">Wednesday                                
                                <input type="checkbox" value="4" name="slots[]">Thursday
                                <input type="checkbox" value="5" name="slots[]">Friday
                                <input type="checkbox" value="6" name="slots[]">Saturday<br>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <br>
                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <input type="submit" class="btn btn-primary" value="Register">
                                   
                                
                            </div>
                        </div>
                        
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

<script type="text/javascript"> 
    $(document).ready(function() { 
        $("#slots").hide();

        // $("input[name='role']").click(function(){
        //     var radioValue = $("input[name='role']:checked").val();
        //     if(radioValue.trim() == "patient"){
        //         $("#slots").hide();
        //     }
        //     else if(radioValue.trim() == "doctor"){
        //         $("#slots").show();
        //     }
        // })
    });


// window.onload = function() {
//   document.getElementById('slots').style.display = 'none';
// };

</script>
