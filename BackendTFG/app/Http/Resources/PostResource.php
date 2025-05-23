<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PostResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id'           => $this->id,
            'user_id'      => $this->user_id,
            'usuario'      => [
                'id'     => $this->usuario->id ?? null,
                'nombre' => $this->usuario->nombre ?? null,
                'email'  => $this->usuario->email ?? null,
            ],
            'fecha'        => $this->fecha,
            'contenido'    => $this->contenido,
            'visibilidad'  => $this->visibilidad,
            'desactivado'  => $this->desactivado,
            'created_at'   => $this->created_at,
            'updated_at'   => $this->updated_at,
        ];
    }
}
