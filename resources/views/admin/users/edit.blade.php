@extends('layouts.admin')

@section('content')
    <h1><b>Edit User</b></h1>
    <div class="row">
        <div class="col-md-12">
            <div class="col-md-3 img-responsive img-rounded">
                <img height="200" style="max-width: 220px;" src="{{$user->photo ? $user->photo->file : 'http://placehold.it/400x400'}}" alt="">
            </div>
            <div class="col-md-9">
                {!!Form::model($user,['method'=>'PATCH','action'=>['AdminUserController@update', $user->id  ],'files'=>true])!!}
                <div class="form-group">
                    {!! Form::label('name','Name') !!}
                    {!! Form::text('name',null,['class'=>'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('email','Email') !!}
                    {!! Form::text('email', null,['class'=>'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('role_id','Role') !!}
                    {!! Form::select('role_id', ['Choose Role']+$roles,null,['class'=>'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('is_active','Status') !!}
                    {!! Form::select('is_active',array(1=>'Active', 0=>'Not Active') ,null,['class'=>'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('photo_id','Photo') !!}
                    {!! Form::file('photo_id',['class'=>'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('password','Password') !!}
                    {!! Form::password('password',['class'=>'form-control']) !!}
                </div>


                <div class="form-group">
                    {!! Form::submit('Update User',['class'=>'btn btn-block btn-primary']) !!}
                </div>
                {!! Form::close() !!}

                {!!Form::open(['method'=>'DELETE','action'=>['AdminUserController@destroy',$user->id]])!!}

                <div class="form-group">
                    {!! Form::submit('Delete user',['class'=>'btn btn-block btn-danger']) !!}
                </div>
                {!! Form::close() !!}

          </div>
        </div>
    </div>
    <div class="row">
        {{--        @include('includes.form_error')--}}
    </div>
@endsection
