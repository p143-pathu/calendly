@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card-header">{{__('Post Query')}}</div>

                <div class="card-body">
                    <form method="post" action="/posts">
                        @csrf
                        <div class="form-group row">
                            <label for="title" class="col-md-4 col-form-label text-md-right">{{__('Title')}}</label>
                            <div class="col-md-7">
                                <input id="title" type="text" class="form-control" name="title" value="{{old('title')}}" required autofocus autocomplete="name">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="body" class="col-md-4 col-form-label text-md-right">{{__('Body')}}</label>
                            <div class="col-md-7">
                                <textarea class="form-control" name="body" required rows="5">{{old('body')}}</textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="subject" class="col-md-4 col-form-label text-md-right">{{__('Subject')}}</label>
                            <div class="col-md-7">
                                <select class="form-control" name="subject">
                                    <option value="">--Select Subject--
                                    @foreach($subjects as $key=>$subject)
                                        <option value="{{$subject->subject_id}}">{{$subject->sub_name}}({{$subject->course_code}})
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        
                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <input type="submit" class="btn btn-primary col-md-4" value="Post"> &nbsp&nbsp&nbsp&nbsp&nbsp 
                                <input type="reset" class="btn btn-danger col-md-4" value="Reset">  
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection