<?php

namespace App\Http\Controllers;

use App\Photo;
use Illuminate\Http\Request;

class AdminMediasController extends Controller
{
    public function index()
    {
        $photos = Photo::all();
        return view('admin.media.index',compact('photos'));
    }
    public function create()
    {
        return view('admin.media.create');
    }

    public function store(Request $request)
    {
        if ($file = $request->file('file')){
            $name = time(). $file->getClientOriginalName();
            $file->move('images', $name);
            Photo::create(['file'=>$name]);
            return redirect('admin/media');
        }
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        $photo = Photo::findOrFail($id);
        if ($photo->file){
            unlink(public_path(). $photo->file);
            $photo->delete();
            return redirect('admin/media');
        }else{
            $photo->delete();
            return redirect('admin/media');
        }


    }
}
