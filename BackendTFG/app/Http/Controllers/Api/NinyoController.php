<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreNinyoRequest;
use App\Http\Requests\UpdateNinyoRequest;
use App\Models\Ninyo;
use Illuminate\Http\Request;
use App\Http\Resources\NinyoResource;
use Illuminate\Support\Facades\Storage;
use App\Enums\Rol;

class NinyoController extends BaseController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ninyosActivos = Ninyo::where('desactivado', 0)->get();
        return NinyoResource::collection($ninyosActivos);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreNinyoRequest $request)
    {
        try{
            $validated = $request->validated();
            $ninyo = Ninyo::create($validated);
            return $this->sendResponse(new NinyoResource($ninyo), 201);
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

            $usuario = auth()->user();
            if (!in_array($usuario->rol, [Rol::Admin, Rol::Junta])) {
                return $this->sendError(['message' => 'No tienes permiso para eliminar este evento.'], 403);
            }
            $ninyo->desactivado = 1;
            $ninyo->save();
            return $this->sendResponse([], 204);
        }catch (\Exception $e) {
            return $this->sendError(['message' => $e->getMessage()], $e->status ?? 400);
        }
    }
}
