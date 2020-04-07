@extends('layouts.admin')

@section('content')
    @if(count($replies)>0)

        <h1 class="text-center"><b>Comments Reply</b></h1>

        <table class="table table-hover">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Image</th>
                <th scope="col">Author</th>
                <th scope="col">Email</th>
                <th scope="col">body</th>
                <th scope="">Post Link</th>
                <th scope="">Replies</th>
                <th scope="col" colspan="2" class="text-center">Actions</th>
            </tr>
            </thead>
            <tbody>
            @if($replies)
                @foreach($replies as $reply)
                    <tr>
                        <td>{{$reply->id}}</td>
                        <td><img height="35" src="{{$reply->photo ? $reply->photo->file:'No photo exist'}}"></td>
                        <td>{{$reply->author}}</td>
                        <td>{{$reply->email}}</td>
                        <td>{{Str::limit($reply->body, 10)}}</td>
                        <td><a href="{{url('/post', $reply->comment->post->id)}}">View Post</a></td>
                        <td>
                            @if($reply->is_active==1)
                                {!!Form::open(['method'=>'PATCH','action'=>['CommentRepliesControllerController@update', $reply->id]])!!}

                                <input type="hidden" name="is_active" value="0">
                                <div class="form-group">
                                    {!! Form::submit('UnApprove',['class'=>'btn btn-success']) !!}
                                </div>
                                {!! Form::close() !!}

                            @else
                                {!!Form::open(['method'=>'PATCH','action'=>['CommentRepliesController@update', $reply->id]])!!}

                                <input type="hidden" name="is_active" value="1">
                                <div class="form-group">
                                    {!! Form::submit('Approve',['class'=>'btn btn-primary']) !!}
                                </div>
                                {!! Form::close() !!}

                            @endif
                        </td>
                        <td>
                            @if($reply)

                                {!!Form::open(['method'=>'DELETE','action'=>['CommentRepliesController@destroy', $reply->id]])!!}

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
