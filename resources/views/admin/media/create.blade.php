@extends('layouts.admin')

@section('style')
@endsection
@section('content')

    <h1><b>Upload Images</b></h1>
     {!!Form::open(['method'=>'post','action'=>'AdminMediasController@store','class'=>'dropzone'])!!}

     {!! Form::close() !!}


@endsection
@section('scripts')
@endsection
