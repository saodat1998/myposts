<?php

namespace App\Http\Controllers;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    public function index()
    {
        $categories = Category::whereNull('parent_id')->with('children')->get();
        $response = [];
        foreach ($categories as $category) {
            $response[] = $this->show($category->name);
        }
        return $response;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:categories',
            'parent_id' => 'sometimes|nullable|numeric'
        ]);
        $parentCategory = Category::find($request->input('parent_id'));
        if(!$parentCategory->parent_id)
        {
            $category = new Category;
            $category->name = $request->input('name');
            $category->parent_id = $request->input('parent_id');
            $category->save();
            return 'success';
        }else{
            return "error";
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($name)
    {
        $category = Category::where('name', $name)->first();

        $response = $category;
        $children = [];
        foreach ($category->children as $item) {
            $children['name'] = $item->name;
            $children['id'] = $item->id;
        }
        $response['children'] = $children;
        return $response;
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
        ]);
        $category = Category::find($id);
        $category->name = $request->input('name');
        $category->save();
        return Category::all();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::find($id);
        $category->delete();
        return Category::all();
    }
}
