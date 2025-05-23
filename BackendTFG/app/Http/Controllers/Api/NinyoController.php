<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreNinyoRequest;
use App\Http\Requests\UpdateNinyoRequest;
use App\Models\Ninyo;
use Illuminate\Http\Request;
use App\Http\Resources\NinyoResource;

class NinyoController extends BaseController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return NinyoResource::collection(Ninyo::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreNinyoRequest $request)
    {
        try{
            $validated = $request->validated();
            $alert = Ninyo::create($validated);
            return $this->sendResponse(new NinyoResource($alert), 201);
        }catch (\Exception $e) {
            return $this->sendError(['message' => $e->getMessage()], $e->status ?? 400);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Ninyo $ninyo)
    {
        return $this->sendResponse(new NinyoResource($ninyo), 'Niño recuperado con éxito.', 200);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateNinyoRequest $request, Ninyo $ninyo)
    {
        try{
            $validated = $request->validated();
            $ninyo->update($validated);

            return $this->sendResponse(new NinyoResource($ninyo), 200);
        }catch (\Exception $e) {
            return $this->sendError(['message' => $e->getMessage()], $e->status ?? 400);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Ninyo $ninyo)
    {
        try{
            $ninyo->delete();
            return $this->sendResponse([], 204);
        }catch (\Exception $e) {
            return $this->sendError(['message' => $e->getMessage()], $e->status ?? 400);
        }
    }
}
