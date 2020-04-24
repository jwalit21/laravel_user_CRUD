@extends('layout.app')

@section('content')
    <h1>Edit user</h1>
    {!! Form::open(['action' => ['PostController@update',$post->id],'method'=> 'POST']) !!}
        <div class="form-group">
            {{Form::label('name','Name')}}
            {{Form::text('name',$post->name,['class' => 'form-control' , 'placeholder' => 'Name' ])}}
        </div>
        <div class="form-group">
            {{Form::label('email','Email')}}
            {{Form::text('email',$post->email,['class' => 'form-control' , 'placeholder' => 'Email' ])}}
        </div>
        {{Form::hidden('_method','PUT')}}
        {{Form::submit('Submit',['class' => 'btn btn-primary'])}}
    {!! Form::close() !!}

@endsection