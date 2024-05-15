<?php

namespace App\Http\Controllers;

use App\Services\PostService;
use Illuminate\Http\Request;

class PostController extends Controller
{

    protected $postService;

    public function __construct(PostService $postService)
    {
        $this->postService = $postService;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = $this->postService->postsAll();
        return response()->json($posts , 201);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $post = $this->postService->createPost($data);

        return response()->json($post , 201);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $post = $this->postService->postSingle($id);
        return response()->json($post , 201);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $data = $request->only([
            'title',
            'description'
        ]);
        $id = $request->id;
        $post = $this->postService->updatePost($id , $data);

        return response()->json($post ,201);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete($id)
    {
        return response()->json($this->postService->delete($id) , 201);
    }
}
