<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserFormRequest;
use App\Photo;
use App\Role;
use App\User;
use Illuminate\Http\Request;

class AdminUserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('admin.users.index',compact('users'));
    }

    public function create()
    {
        $roles = Role::pluck('name','id')->all();
        return view('admin.users.create',compact('roles'));
    }


    public function store(UserFormRequest $request)
    {
        $input = $request->all();
        if ($file = $request->file('photo_id')){
            $name = $file->getClientOriginalName();
            $file->move('images',$name);
            $photo = Photo::create(['file'=>$name]);
            $input['photo_id'] = $photo->id;
        }
        $input['password'] = bcrypt($request->password);
        $user_created = User::create($input);
        if ($user_created){
            echo "created";
            return redirect('admin/users');
        }
//else{
//            return view('includes.email_error');
//        }

    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $roles = Role::pluck('name','id')->all();
        $user = User::findOrFail($id);
        return view('admin.users.edit', compact('user','roles'));
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $photo_id = $user->photo_id;
        if (trim($request->password) ==''){
            $input = $request->except('password');
        }else {
            $input = $request->all();
            $request->password = bcrypt('password');
        }
        if ($file = $request->file('photo_id')){

            $newName = time(). $file->getClientOriginalName();
            $file->move('images',$newName);
            $newPhoto = Photo::create(['file'=>$newName]);
            $input['photo_id'] = $newPhoto->id;

//                   else {
//                       $name = time() . $file->getClientOriginalName();
//                       $file->move('/images',$name);
//                       $photo = Photo::whereId($photo_id)->update(['file' => $name]);
//                       $input['photo_id'] = $photo_id;
//                   }

        }

        $user->update($input);
        return redirect('admin/users');
    }

    public function destroy(Request $request, $id)
    {
        $user = User::findOrFail($id);
        if ($user->photo_id){
            unlink(public_path(). $user->photo->file);
            $user->delete();
            $request->session()->flash('status');
            return redirect('admin/users');
        }
        else{
            $user->delete();
            $request->session()->flash('status');
            return redirect('admin/users');
        }
    }
}
