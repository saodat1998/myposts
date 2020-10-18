<?php

namespace App\Http\Controllers;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Resources\Category as CategoryResource;

class CategoriesController extends Controller
{
    public function index(Request $request)
    {
        $categories = Category::whereNull('parent_id');
        if($request->input('search')){
           $categories->where('name', 'LIKE', "%{$request->input('search')}%");
        }

        return response()->json(['categories' => $categories->with('children')->get()]);
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

        $category = new Category;
        $category->name = $request->input('name');
        $category->parent_id = $request->input('parent_id');
        $category->save();
        return response()->json(['category' => $category]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $category = Category::with('children')->find($id);
        $categoryDTO = new CategoryResource($category);

        return response()->json(['category' => $categoryDTO]);
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
            'parent_id' => 'sometimes'
        ]);

        $category = Category::find($id);
        $category->name = $request->input('name');
        $category->parent_id = $request->input('parent_id');
        $category->save();

        return response()->json(['category' => $category]);
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
        if($category->delete()){
            $status = true;
        }else{
            $status = false;
        }

        return response()->json(['message' => $status]);
    }
}
