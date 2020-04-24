@extends('layout.app')

@section('content')
    <h1>posts</h1>
    <hr>
    @if (count($post_data) > 0)
        @foreach ($post_data as $post)
            <div class="well">
            <h3><a href="posts/{{$post->id}}">{{$post->name}}</a></h3>
            <small>email is {{$post->email}}</small><br>
            <small>created by {{$post->user_id}}</small><hr>
            </div>
        @endforeach
        
    @else
        <p> No post found</p>
    @endif
@endsection