<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class RespuestaResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'contenido' => $this->contenido,
            'fecha' => $this->fecha,
            'desactivado' => $this->desactivado,
            'post' => [
                'id' => $this->post->id,
            ],
            'usuario' => [
                'id' => $this->usuario->id,
                'nombre' => $this->usuario->nombre ?? null, 
            ],
        ];
    }
}
