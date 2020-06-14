@extends('layouts.app')

@section('content')

    <div class="post">
    <h2>{{$post->title}}</h2>
    {{$post->body}}
    <hr><small class='author'>Created by {{$post->user->name}} on {{$post->created_at}}</small>
    
    
    @if(!Auth::guest())
        @if(Auth::user()->id == $post->user->id)
            <a href="/posts/{{$post->id}}/edit" class="btn btn-default">Edit</a>
        @endif
        <a href='/posts' class="btn btn-default">Go Back</a><br>
    @endif
    <br>
    <h5>Comments</h5>
    <form action="/comments" method="post">
        @csrf
        <input type="hidden" name="postid" value="{{$post->id}}">
        <input type="hidden" name="userid" value="{{Auth()->user()->id}}" >
        <div class="col-md-5">
            <textarea name="comment"  class="form-control" rows="3" cols="45"></textarea><br>
        </div>
        <input type="submit" value="Comment">
    </form>
        <br><br>
        @foreach($post->comments as $comments)
            @foreach($users as $user)
                @if($user->id == $comments->user_id)
                    <b>{{$user->name}}
                    @if($user->role == "faculty")
                        <img src="https://img.icons8.com/color/15/000000/verified-account.png">
                    @endif
                    &nbsp&nbsp</b>
                @endif
            @endforeach
            {{$comments->body}}<br>
            <!-- <a href="/like"><span id="like"></span> <i class="fa fa-thumbs-up" aria-hidden="true" style="color:#3e59de"></i>Like</a> .  -->
            <form id="deleteForm{{$comments->id}}" action="/comments/{{$comments->id}}" method="POST">
                @csrf
                {{ method_field('DELETE') }}
                <a href="javascript:{}" onclick="document.getElementById('deleteForm{{$comments->id}}').submit(); return false;">Delete</a> . <small>{{$comments->created_at}}</small><br><br>
            </form>
        @endforeach
        
    </div>

@endsection

