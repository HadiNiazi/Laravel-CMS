@extends('layouts.admin')

@section('content')
    <h1><b>Create Post</b></h1>

    {!!Form::open(['method'=>'post','action'=>'AdminPostController@store','files'=>true])!!}

    <div class="form-group">
        {!! Form::label('title','Title') !!}
        {!! Form::text('title', null,['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('category_id','Category') !!}
        {!! Form::select('category_id',['0'=>'Php','1'=>'Laravel','2'=>'JavaScript'],null,['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('photo_id','Photo') !!}
        {!! Form::file('photo_id',['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('body','Description') !!}
        {!! Form::textarea('body',null,['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::submit('Create Post',['class'=>'btn btn-primary']) !!}
    </div>
    {!! Form::close() !!}
@endsection
