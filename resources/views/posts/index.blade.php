@extends('layouts.app')

@section('content')
    <div class="sidenav">
        @foreach($subjects as $key=>$subject)
            <a href="/subjects/{{$subject->subject_id}}">{{$subject->sub_name}}({{$subject->course_code}})</a><br>
        @endforeach
    </div>

    <div class="main">
        @if(count($posts) > 0)

            @foreach($posts as $key=>$post)
                <div class="well">
                    <h4><a href="/posts/{{$post->id}}">{{$post->title}}</a></h4>
                    <h5>{{str_limit($post->body,100)}}</h5>
                    <p>Subject: {{$post->subject->sub_name}}</p>
                    <small>Posted by {{$post->user->name}} on {{$post->created_at}}</small>
                    <br><br>
                </div>    
            @endforeach
        @else
            <h3> No posts found</h3>
        @endif
    </div>
@endsection