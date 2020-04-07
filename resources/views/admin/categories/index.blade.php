@extends('layouts.admin')

@section('content')

   <h1><b>Categories</b></h1>
    <div class="row">
{{--        @if(session('status'))--}}
{{--            <p class="bg-danger">User has been deleted</p>--}}
{{--        @endif--}}
    </div>

   <div class="row">
    <div class="col-md-6">
     {!!Form::open(['method'=>'post','action'=>'AdminCategoriesController@store'])!!}
        <div class="form-group">
            {!! Form::label('name','Name') !!}
            {!! Form::text('name',null,['class'=>'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::submit('Create Category',['class'=>'btn btn-primary']) !!}
        </div>
         {!! Form::close() !!}

        @include('includes.form_error')
    </div>

   <div class="col-md-6">

       <table class="table table-hover">
           <thead>
           <tr>
               <th scope="col">#</th>
               <th scope="col">Name</th>
               <th scope="col">Created</th>
               <th scope="col">Updated</th>
           </tr>
           </thead>
           <tbody>
           @if($categories)
               @foreach($categories as $category)
                   <tr>
                       <td>{{$category->id}}</td>
                       <td><a href="{{url('admin/categories/'.$category->id.'/edit')}}">{{$category->name}}</a></td>
                       <td>{{$category->created_at->diffForHumans()}}</td>
                       <td>{{$category->updated_at->diffForHumans()}}</td>
                   </tr>
               @endforeach
           @endif
           </tbody>
       </table>
   </div>

</div>

@endsection
