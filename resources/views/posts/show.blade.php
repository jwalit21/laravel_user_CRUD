@extends('layout.app')

@section('content')
    <br>
    @if ($post)
            <h1>{{$post->id}}</h1>
            <div class="well">
            <h3>{{$post->name}}</h3>
            </div>
            <hr>
            <small>email is {{$post->email}}</small>
            <hr>
            @if (Auth::user()->id == $post->user_id)

            <a href="{{$post->id}}/edit" class="btn btn-primary">edit</a>
            <hr>
            {!!Form::open(['action' => ['PostController@destroy',$post->id],'method' => 'POST']) !!}

                {{Form::hidden('_method','DELETE')}}
                {{Form::submit('Delete',['class' => 'btn btn-danger'])}}
            
            {!!Form::close()!!}

            @endif
    @else
        <p>No perticular user found</p>
    @endif
@endsection