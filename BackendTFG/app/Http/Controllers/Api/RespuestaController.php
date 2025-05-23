<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreRespuestaRequest;
use App\Http\Requests\UpdateRespuestaRequest;
use App\Models\Respuesta;
use Illuminate\Http\Request;
use App\Http\Resources\RespuestaResource;

class RespuestaController extends BaseController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return RespuestaResource::collection(Respuesta::all());

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRespuestaRequest $request)
    {
        try{
            $validated = $request->validated();
            $alert = Respuesta::create($validated);
            return $this->sendResponse(new RespuestaResource($alert), 201);
        }catch (\Exception $e) {
            return $this->sendError(['message' => $e->getMessage()], $e->status ?? 400);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Respuesta $respuesta)
    {
        return $this->sendResponse(new RespuestaResource($respuesta), 'Respuesta recuperado con éxito.', 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRespuestaRequest $request, Respuesta $respuesta)
    {
        try{
            $validated = $request->validated();
            $respuesta->update($validated);

            return $this->sendResponse(new RespuestaResource($respuesta), 200);
        }catch (\Exception $e) {
            return $this->sendError(['message' => $e->getMessage()], $e->status ?? 400);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Respuesta $respuesta)
    {
        try{
            $respuesta->delete();
            return $this->sendResponse([], 204);
        }catch (\Exception $e) {
            return $this->sendError(['message' => $e->getMessage()], $e->status ?? 400);
        }
    }
}
