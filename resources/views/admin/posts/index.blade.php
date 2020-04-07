@extends('layouts.admin')

@section('content')
    <h1><b>Posts</b></h1>
   @if(session()->has('deleted_status'))
       <p class="bg-danger">Post deleted successfully!</p>
       @endif
    <table class="table table-hover">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Post Image</th>
            <th scope="col">Owner</th>
            <th scope="col">Category</th>
            <th scope="col">Title</th>
            <th scope="col">body</th>
            <th scope="col">Post</th>
            <th scope="col">Comments</th>
            <th scope="col">Created</th>
            <th scope="col">Updated</th>

        </tr>
        </thead>
        <tbody>
        @if($posts)
            @foreach($posts as $post)
                <tr>
                    <td>{{$post->id}}</td>
                    <td><img height="40" width="100" src="{{$post->photo? $post->photo->file:'no photo exists'}}"></td>
                    <td>{{$post->user ? $post->user->name:'Not linked'}}</td>
                    <td>{{$post->category? $post->category->name:'No Categories'}}</td>
                    <td><a href="{{url('admin/posts/'.$post->id.'/edit')}}">{{$post->title}}</a></td>
                    <td>{{Str::limit($post->body, 10) }}</td>
                    <td><a href="{{url('post', $post->id)}}">View Post</a></td>
                    <td><a href="{{url('admin/comments', $post->id)}}">View Comments</a></td>
                    <td>{{$post->created_at}}</td>
                    <td>{{$post->updated_at}}</td>
                </tr>
            @endforeach
        @endif
        </tbody>
    </table>
@endsection
