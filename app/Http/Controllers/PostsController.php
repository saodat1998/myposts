<?php

namespace App\Http\Controllers;

use App\Forms\PostForm;
use App\Http\Requests\PostRequest;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Http\Resources\Post as PostResource;
use App\Http\Resources\PostCollection;
use Exception;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */


    public function index(Request $request)
    {
        $posts = Post::select('*');

        if ($request->input('search'))
        {
            $posts->where('title', 'LIKE', "%{$request->input('search')}%");
        }

        return response()->json(new PostCollection($posts->get()));
    }


    public function create(PostForm $form)
    {
        return response()->json($form->buildForm());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostRequest $postRequest)
    {
        try{

            $post = new Post;
            $post->fill($postRequest->validated());
            $post->status = Post::STATUS_ACTIVE;
            $post->user_id = auth()->user()->id;

            $post->save();
        } catch(Exception $e)
        {
            return response()->json(['message' => $e->getMessage(), 500]);
        }

        $postDTO = new PostResource($post);
        return response()->json(['post' => $postDTO]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);
        $postDTO = new PostResource($post);

        return response()->json(['post' => $postDTO]);
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
        try
        {
            $this->validate($request, [
                'title' => 'required',
                'body' => 'required',
                'category_id' => 'required',
            ]);

            $post = Post::find($id);
            $post->title = $request->input('title');
            $post->body = $request->input('body');
            $post->category_id = $request->input('category_id');
            $post->save();

        } catch(Exception $e)
        {
            return response()->json(['message' => $e->getMessage(), 500]);
        }

        $postDTO = new PostResource($post);

        return response()->json(['post' => $postDTO]);
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
            $post = Post::find($id);
            $post->delete();
        } catch(Exception $e)
        {
            return response()->json(['message' => $e->getMessage(), 500]);
        }

        return response()->json(['message' => true]);
    }
}
