<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreRespuestaRequest;
use App\Http\Requests\UpdateRespuestaRequest;
use App\Models\Respuesta;
use Illuminate\Http\Request;
use App\Http\Resources\RespuestaResource;
use Illuminate\Database\Eloquent\ModelNotFoundException;

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
            $validated['user_id'] = auth()->id();
            $validated['fecha'] = now();
            $validated['desactivado'] = 0;
            $respuesta = Respuesta::create($validated);
            return $this->sendResponse(new RespuestaResource($respuesta), 201);
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
            $validated['user_id'] = auth()->id();
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
        try {
            $respuesta->desactivado = 1;
            $respuesta->save();
            return $this->sendResponse([], 204);
        } catch (ModelNotFoundException $e) {
            return $this->sendError(['message' => 'Respuesta no encontrada'], 404);
        } catch (\Exception $e) {
            return $this->sendError(['message' => $e->getMessage()], $e->getCode() ?: 400);
        }
    }

        public function getByPost($postId)
    {
        $respuestas = Respuesta::with('usuario')
            ->where('post_id', $postId)
            ->where('desactivado', 0)
            ->orderBy('created_at', 'asc')
            ->get();

        return $this->sendResponse(RespuestaResource::collection($respuestas),'Respuestas recuperadas con éxito.',200);
    }
}
