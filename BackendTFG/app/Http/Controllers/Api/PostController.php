<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Resources\PostResource;

class PostController extends BaseController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return PostResource::collection(Post::all());

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePostRequest $request)
    {
        try{
            $validated = $request->validated();
            $alert = Post::create($validated);
            return $this->sendResponse(new PostResource($alert), 201);
        }catch (\Exception $e) {
            return $this->sendError(['message' => $e->getMessage()], $e->status ?? 400);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        return $this->sendResponse(new PostResource($post), 'Post recuperado con éxito.', 200);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePostRequest $request, Post $post)
    {
        try{
            $validated = $request->validated();
            $post->update($validated);

            return $this->sendResponse(new PostResource($post), 200);
        }catch (\Exception $e) {
            return $this->sendError(['message' => $e->getMessage()], $e->status ?? 400);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        try{
            $post->delete();
            return $this->sendResponse([], 204);
        }catch (\Exception $e) {
            return $this->sendError(['message' => $e->getMessage()], $e->status ?? 400);
        }
    }
}
