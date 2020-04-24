@extends('layout.app')

@section('content')
    <h1>Create user</h1>
    {!! Form::open(['action' => 'PostController@store','method'=> 'POST','enctype'=>'multipart/data']) !!}
        <div class="form-group">
            {{Form::label('name','Name')}}
            {{Form::text('name','',['class' => 'form-control' , 'placeholder' => 'Name' ])}}
        </div>
        <div class="form-group">
            {{Form::label('email','Email')}}
            {{Form::text('email','',['class' => 'form-control' , 'placeholder' => 'Email' ])}}
        </div>
        <div class="form-group">
            {{Form::file('cover_image')}}
        </div>
        {{Form::submit('Submit',['class' => 'btn btn-primary'])}}
    {!! Form::close() !!}

@endsection