@extends('layouts.admin')

@section('content')


    <h1><b>Categories</b></h1>
    <div class="row">
        {{--    @if(session('status'))--}}
        {{--        <p class="bg-danger">User has been deleted</p>--}}
        {{--    @endif--}}
    </div>

    <div class="row">
        <div class="col-md-6">
            {!!Form::model($category,['method'=>'PATCH','action'=>['AdminCategoriesController@update',$category->id]])!!}
            <div class="form-group">
                {!! Form::label('name','Name') !!}
                {!! Form::text('name',null,['class'=>'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::submit('Update Category',['class'=>'btn btn-primary col-sm-6']) !!}
            </div>
            {!! Form::close() !!}

            <!-- =============================Here is delete form ======================================-->

            {!!Form::model($category,['method'=>'DELETE','action'=>['AdminCategoriesController@destroy',$category->id]])!!}
            <div class="form-group">
                {!! Form::submit('Delete Category',['class'=>'btn btn-danger col-sm-6']) !!}
            </div>
            {!! Form::close() !!}

            @include('includes.form_error')
        </div>
    </div>



@endsection
