@extends('layouts.app')

@section('content')
<div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card-header">{{__('Edit Post')}}</div>

                <div class="card-body">
                    
                    <form action="/posts/{{$post[0]->id}}" method="post" >
                        @csrf
                        @method('PATCH')
                        <div class="form-group row">
                            <label for="title" class="col-md-4 col-form-label text-md-right">{{__('Title')}}</label>
                            <div class="col-md-6">
                                <input id="title" type="text" class="form-control" name="title" value="{{$post[0]->title}}" required autofocus autocomplete="name">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="body" class="col-md-4 col-form-label text-md-right">{{__('Body')}}</label>
                            <div class="col-md-6">
                                <textarea class="form-control" name="body" required>{{$post[0]->body}}</textarea>
                            </div>
                        </div>
                        
                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <input type="submit" class="btn btn-primary" value="Edit">&nbsp&nbsp&nbsp&nbsp
                                <a class="btn btn-danger" href="/posts">Cancel<a>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>

@endsection