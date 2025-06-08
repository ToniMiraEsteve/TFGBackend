<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Api\BaseController;
use App\Http\Requests\StoreEventRequest;
use App\Http\Requests\UpdateEventRequest;
use App\Models\Evento;
use App\Http\Resources\EventoResource;
use App\Enums\Rol;

class EventoController extends BaseController
{

    public function getValidData(){
        $query = Evento::query();

        $params = request()->except(['debug', 'fecha', 'hora_inicio', 'hora_fin']);

        foreach ($params as $key => $value) {
            if (in_array($key, (new Evento)->getFillable())) {
                if ($value === 'null') {
                    $query->whereNull($key);
                } else {
                    $query->where($key, $value);
                }
            }
        }

        if (request()->has('fecha')) {
            $query->where('fecha', '>=', request()->fecha);
        }

        if (request()->has('hora_inicio')) {
            $query->where('hora_inicio', '>=', request()->hora_inicio);
        }

        if (request()->has('hora_fin')) {
            $query->where('hora_fin', '<=', request()->hora_fin);
        }

        return $query->get();
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return EventoResource::collection($this->getValidData());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreEventRequest $request)
    {
        try{
            $validated = $request->validated();
            $alert = Evento::create($validated);
            return $this->sendResponse(new EventoResource($alert), 201);
        }catch (\Exception $e) {
            return $this->sendError(['message' => $e->getMessage()], $e->status ?? 400);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Evento $evento)
    {
        return $this->sendResponse(new EventoResource($evento), 'Evento recuperado con éxito.', 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateEventRequest $request, Evento $evento)
    {
        try{
            $validated = $request->validated();
            $evento->update($validated);

            return $this->sendResponse(new EventoResource($evento), 200);
        }catch (\Exception $e) {
            return $this->sendError(['message' => $e->getMessage()], $e->status ?? 400);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Evento $evento)
    {
        try{

            $usuario = auth()->user();
            if (!in_array($usuario->rol, [Rol::Admin, Rol::Junta]) && $usuario->id !== $evento->user_id) {
                return $this->sendError(['message' => 'No tienes permiso para eliminar este evento.'], 403);
            }

            $evento->delete();
            return $this->sendResponse([], 204);
        }catch (\Exception $e) {
            return $this->sendError(['message' => $e->getMessage()], $e->status ?? 400);
        }
    }
}
