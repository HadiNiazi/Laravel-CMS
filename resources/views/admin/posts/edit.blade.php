@extends('layouts.admin')

@section('content')
    <h1><b>Edit Post</b></h1>

   <div class="row">
       <div class="col-md-3">
           <img height="220" style="max-width: 220px;border-radius: 3px" src="{{$post->photo ? $post->photo->file : 'no photo exists'}}" alt="">
       </div>
       <div class="col-md-9">
           {!!Form::model($post, ['method'=>'PATCH','action'=>['AdminPostController@update',$post->id], 'files'=>true])!!}

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
               {!! Form::submit('Update Post',['class'=>'btn btn-block btn-primary']) !!}
           </div>
           {!! Form::close() !!}



           {!!Form::model($post, ['method'=>'DELETE','action'=>['AdminPostController@destroy',$post->id], 'files'=>true])!!}

           <div class="form-group">
               {!! Form::submit('Delete Post',['class'=>'btn btn-block btn-danger']) !!}
           </div>
           {!! Form::close() !!}
       </div>

   </div>
{{--    <div class="row">--}}
{{--        @include('includes.form_error')--}}
{{--    </div>--}}
@endsection
