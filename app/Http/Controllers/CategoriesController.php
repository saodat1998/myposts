<?php

namespace App\Http\Controllers;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Resources\Category as CategoryResource;
use Exception;

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
        try{
            $this->validate($request, [
                'name' => 'required|unique:categories',
                'parent_id' => 'sometimes|nullable|numeric'
            ]);

            $category = new Category;
            $category->name = $request->input('name');
            $category->parent_id = $request->input('parent_id');
            $category->save();
        } catch(Exception $e)
        {
            return response()->json(['message' => $e->getMessage(), 500]);
        }

        $categoryDTO = new CategoryResource($category);
        return response()->json(['category' => $categoryDTO]);
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
        try {
            $this->validate($request, [
                'name' => 'required',
                'parent_id' => 'sometimes'
            ]);

            $category = Category::find($id);
            $category->name = $request->input('name');
            $category->parent_id = $request->input('parent_id');

            $category->save();
        } catch(Exception $e)
        {
            return response()->json(['message' => $e->getMessage(), 500]);
        }

        $categoryDTO = new CategoryResource($category);
        return response()->json(['category' => $categoryDTO]);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $category = Category::find($id);
            $category->delete();
        } catch(Exception $e)
        {
            return response()->json(['message' => $e->getMessage(), 500]);
        }

        return response()->json(['message' => true]);
    }
}
