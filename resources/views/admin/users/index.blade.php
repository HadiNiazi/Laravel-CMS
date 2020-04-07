@extends('layouts.admin')

@section('content')
    <h1><b>Users</b></h1>
    @if(session('status'))
        <p class="bg-danger text-center">User has been deleted</p>
    @endif
    <table class="table table-hover">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Profile</th>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">Role</th>
            <th scope="col">Status</th>
            <th scope="col">Created</th>
            <th scope="col">Updated</th>
        </tr>
        </thead>
        <tbody>
        @if($users)
            @foreach($users as $user)
                <tr>
                    <td>{{$user->id}}</td>
                    <td><img height="35" src="{{$user->photo ? $user->photo->file:'http://placehold.it/64x64'}}"></td>
                    <td><a href="{{url('admin/users/'.$user->id.'/edit')}}" style="text-decoration: none">{{$user->name}}</a></td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->role ? $user->role->name:'no role assigned'}}</td>
                    <td>{{$user->is_active==1 ? 'Active':'Not Active' }}</td>
                    <td>{{$user->created_at->diffForHumans()}}</td>
                    <td>{{$user->updated_at->diffForHumans()}}</td>
                </tr>
            @endforeach
        @endif
        </tbody>
    </table>
@endsection
