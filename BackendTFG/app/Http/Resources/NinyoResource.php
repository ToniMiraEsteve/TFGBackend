<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class NinyoResource extends JsonResource
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
            'nombre' => $this->nombre,
            'curso' => $this->curso,
            'ubicacion_sip' => $this->ubicacion_sip,
            'ubicacion_fotos' => $this->ubicacion_fotos,
            'numero_contacto' => $this->numero_contacto,
            'nombre_padres' => $this->nombre_padres,
            'enfermedades_alergias' => $this->enfermedades_alergias,
            'correo_id' => $this->correo_id,
            'desactivado' => $this->desactivado,
        ];
    }
}
