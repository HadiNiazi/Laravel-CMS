@extends('layouts.admin')

@section('content')

    <h1><b>All Media</b></h1>

       @if(session('status'))
               <p class="bg-danger">User has been deleted</p>
           @endif


    <div class="row">

        <div class="col-md-12">
            <table class="table table-hover">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Image</th>
                    <th scope="col">Created</th>
                    <th scope="col">Updated</th>
                    <th scope="col">Action</th>
                </tr>
                </thead>
                <tbody>
                @if($photos)
                    @foreach($photos as $photo)
                        <tr>
                            <td>{{$photo->id}}</td>
                            <td><img height="50" src="{{$photo->file}}"></td>
                            <td>{{$photo->created_at->diffForHumans()}}</td>
                            <td>{{$photo->updated_at->diffForHumans()}}</td>
                            <td>
                                 {!!Form::open(['method'=>'DELETE','action'=>['AdminMediasController@destroy', $photo->id]])!!}

                                    <div class="form-group">
                                        {!! Form::submit('Delete',['class'=>'btn btn-danger']) !!}
                                    </div>
                                     {!! Form::close() !!}
                            </td>
                        </tr>
                    @endforeach
                @endif
                </tbody>
            </table>
        </div>
    </div>

@endsection
