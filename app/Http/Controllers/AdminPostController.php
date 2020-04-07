<?php

namespace App\Http\Controllers;

use App\Http\Requests\EditPostRequest;
use App\Photo;
use App\Post;
use http\Client\Curl\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminPostController extends Controller
{

    public function index()
    {
        $posts = Post::all();
        return view('admin.posts.index',compact('posts'));
    }

    public function create()
    {
        return view('admin.posts.create');
    }

    public function store(Request $request)
    {
        $login_user = Auth::user();
        $input = $request->all();

        if ($file = $request->file('photo_id')){
            $name = time(). $file->getClientOriginalName();
            $file->move('images',$name);
            $photo = Photo::create(['file'=>$name]);
            $input['photo_id'] = $photo->id;
        }
        if ($login_user){
            $login_user->post()->create($input);
            return redirect('admin/posts');
        }else{
            $request->session()->flash('login');
            return redirect('/login');
        }
    }

    public function show($id)
    {
        //
    }

    public function edit(Request $request, $id)
    {
        $post = Post::findOrFail($id);
        return view('admin.posts.edit',compact('post'));
    }

    public function update(Request $request, $id)
    {
        $login_user = Auth::user();
        $input = $request->all();

        if ($file = $request->file('photo_id')){
            $name = time(). $file->getClientOriginalName();
            $file->move('images',$name);
            $photo = Photo::create(['file'=>$name]);
            $input['photo_id'] = $photo->id;
        }

        $login_user->post()->whereId($id)->first()->update($input);
        return redirect('admin/posts');
    }

    public function destroy(Request $request, $id)
    {
        $deleted_user = Post::findOrFail($id);
        unlink(public_path(). $deleted_user->photo->file);
        $deleted_user->delete();
        $request->session()->flash('deleted_status');
        return redirect('admin/posts');
    }
    public function post($id){
        $post = Post::findOrFail($id);
        return view('post', compact('post'));
    }
}
