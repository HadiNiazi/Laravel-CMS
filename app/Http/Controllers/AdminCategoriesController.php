<?php

namespace App\Http\Controllers;

use App\category;
use App\Http\Requests\CreateCategoryRequest;
use Illuminate\Http\Request;

class AdminCategoriesController extends Controller
{
    public function index()
    {
        $categories = category::all();
        return view('admin.categories.index',compact('categories'));
    }

    public function create()
    {
        //
    }
    public function store(CreateCategoryRequest $request)
    {
        category::create($request->all());
        return redirect('admin/categories');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $category = category::findOrFail($id);
        return view('admin.categories.edit',compact('category'));
    }

    public function update(CreateCategoryRequest $request, $id)
    {
        $category = category::findOrFail($id);
        $category->update($request->all());
        return redirect('admin/categories');
    }

    public function destroy($id)
    {
        category::findOrFail($id)->delete();
        return redirect('admin/categories');
    }
}
