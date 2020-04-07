@extends('layouts.blog-post')

@section('content')


    <!-- Title -->
    <h1>{{$post->title}}</h1>

    <!-- Author -->
    <p class="lead">
        by <a href="#">{{$post->user->name}}</a>
    </p>

    <hr>

    <!-- Date/Time -->
    <p><span class="glyphicon glyphicon-time"></span>  {{$post->created_at->diffForHumans()}}</p>

    <hr>

    <!-- Preview Image -->
    <img class="img-responsive" src="{{$post->photo->file}}" alt="Post Image">

    <hr>

    <!-- Post Content -->
    <h4><b>Description</b></h4>
    <p style="font-size: 16px">{{$post->body}}</p>



    <!-- Blog Comments -->
    <!-- Comments Form -->
    @if(session()->has('comment_message'))
        <hr>
    <p style="color: green" class="text-center"><b>Your comment is submitted and under moderation.</b></p>
    @endif

    @if(Auth::user())

        <div class="well">
            <h4>Leave a Comment:</h4>

            {!!Form::open(['method'=>'post','action'=>'PostCommentsController@store'])!!}
            <input type="hidden" name="post_id" value="{{$post->id}}">
            <div class="form-group">
                {!! Form::textarea('body',null,['class'=>'form-control','rows'=>'3']) !!}
            </div>

            <div class="form-group">
                {!! Form::submit('Comment',['class'=>'btn btn-primary']) !!}
            </div>
            {!! Form::close() !!}


        </div>

    @endif

    <hr>

    <!-- Posted Comments -->

    <!-- Comment -->
    @if($post)
        @foreach($post->comments as $comment)
    <div class="media">
        <a class="pull-left" href="#">
            <img height="64" width="64" class="media-object" src="{{$comment->photo->file}}" alt="commenter image">
        </a>
        <div class="media-body">
            <h4 class="media-heading">{{$comment->author}}
                <small>{{$comment->created_at->diffForHumans()}}</small>
            </h4>
           {{$comment->body}}

        <!-- Nested Comment -->
            @if($comment->commentReply)
                @foreach($comment->commentReply as $reply)

                    <div class="media" style="margin-top: 40px;">
                        <a class="pull-left" href="#">
                            <img height="64" width="64" class="media-object" src="{{$reply->photo->file}}" alt="">
                        </a>
                        <div class="media-body">
                            <h4 class="media-heading">{{$reply->author}}
                                <small>{{$reply->created_at->diffForHumans()}}</small>
                            </h4>
                            <p>{{$reply->body}}</p>
                        </div>
                    </div>
                @endforeach
                <!-- End Nested Comment -->
                    <div class="comment-reply-container">
                        <button class="toggle-reply btn btn-primary pull-right">Reply</button>
                 <div class="comment-reply col-md-6" style="margin-top: 10px;" id="comment-reply">

                        {!!Form::open(['method'=>'post','action'=>'CommentRepliesController@store'])!!}
                        <input type="hidden" name="comment_id" value="{{$comment->id}}">
                        <div class="form-group">
                            {!! Form::textarea('body',null,['class'=>'form-control','rows'=>'1']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::submit('Comment',['class'=>'btn btn-primary']) !!}
                        </div>
                        {!! Form::close() !!}

                 </div>

                    @endif

                </div>
        </div>
    </div>
                @endforeach
             @endif
@endsection

@section("scripts")

    <script>

       $(".comment-reply-container .toggle-reply").click(function () {
            $(this).next().slideToggle("slow");
       })
    </script>

@endsection


