@extends('layout.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <a href="posts/create" class="btn btn-primary">Create user</a>
                    <h3>Your User list</h3>
                    <table class="table table-striped">
                        <tr>
                            <th>Title</th>
                            <th></th>
                            <th></th>
                        </tr>
                        @foreach ($posts as $post)
                            <tr>
                                <th>{{$post->name}}</th>
                                <th>{{$post->email}}</th>
                                <th>created by {{$post->user_id}}</th>
                                <th><a href="posts/{{$post->id}}/edit" class="btn btn-primary">Edit</a></th>
                                    <th>
                                    {!!Form::open(['action' => ['PostController@destroy',$post->id],'method' => 'POST']) !!}
                        
                                        {{Form::hidden('_method','DELETE')}}
                                        {{Form::submit('Delete',['class' => 'btn btn-danger'])}}
                                    
                                    {!!Form::close()!!}
                                    </th>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
