@extends('layouts.admin')

@section('content')

    @if($comments)

        <h1 class="text-center"><b>Comments</b></h1>

        <table class="table table-hover">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Image</th>
                <th scope="col">Author</th>
                <th scope="col">Email</th>
                <th scope="col">body</th>
                <th scope="">Post</th>
                <th scope="col">Replies</th>
                <th scope="col" colspan="2" class="text-center">Actions</th>
            </tr>
            </thead>
            <tbody>
            @if($comments)
                @foreach($comments as $comment)
                    <tr>
                        <td>{{$comment->id}}</td>
                        <td><img height="35" src="{{$comment->photo ? $comment->photo->file:'No photo exist'}}"></td>
                        <td>{{$comment->author}}</td>
                        <td>{{$comment->email}}</td>
                        <td>{{$comment->body}}</td>
                        <td><a href="{{url('/post', $comment->post->id)}}">View Post</a></td>
                        <td><a href="{{url('admin/comment/replies', $comment->id)}}">View replies</a></td>
                        <td>
                            @if($comment->is_active==1)
                                {!!Form::open(['method'=>'PATCH','action'=>['PostCommentsController@update', $comment->id]])!!}

                                <input type="hidden" name="is_active" value="0">
                                <div class="form-group">
                                    {!! Form::submit('UnApprove',['class'=>'btn btn-success']) !!}
                                </div>
                                {!! Form::close() !!}

                            @else
                                {!!Form::open(['method'=>'PATCH','action'=>['PostCommentsController@update', $comment->id]])!!}

                                <input type="hidden" name="is_active" value="1">
                                <div class="form-group">
                                    {!! Form::submit('Approve',['class'=>'btn btn-primary']) !!}
                                </div>
                                {!! Form::close() !!}

                            @endif
                        </td>
                        <td>
                            @if($comment)

                                {!!Form::open(['method'=>'DELETE','action'=>['PostCommentsController@destroy', $comment->id]])!!}

                                <div class="form-group">
                                    {!! Form::submit('Delete',['class'=>'btn btn-danger']) !!}
                                </div>
                                {!! Form::close() !!}

                            @endif
                        </td>
                    </tr>
                @endforeach
            @endif
            </tbody>
        </table>

    @else
        <h1 class="text-center"><b>No Comments</b></h1>
    @endif
@endsection
