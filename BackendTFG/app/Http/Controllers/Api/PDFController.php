<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\StorePDFRequest;
use App\Http\Requests\UpdatePDFRequest;
use App\Models\PDF;
use App\Http\Resources\PDFResource;
use Illuminate\Support\Facades\Storage;
use Barryvdh\DomPDF\Facade\Pdf as DomPDF;
use App\Enums\Rol;

class PDFController extends BaseController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return PDFResource::collection(PDF::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePDFRequest $request)
    {
        try {
            $datos = $request->validated();
    
            $datosForm = $datos['datos_form'];
            $pdfHtml = DomPDF::loadView('pdf.pdf_form', $datosForm);
    
            $nombreArchivo = 'pdf_' . uniqid() . '.pdf';
            $ruta = 'public/pdfs/' . $nombreArchivo;
    
            Storage::disk('public')->put($ruta, $pdfHtml->output());
    
            $pdfModel = PDF::create([
                'user_id' => $datos['user_id'],
                'datos_form' => json_encode($datosForm),
                'ruta_pdf' => $ruta,
                'fecha_envio' => $datos['fecha_envio'] ?? now(),
                'estado' => $datos['estado'],
                'desactivado' => $datos['desactivado'] ?? false,
            ]);
    
            return response()->json([
                'data' => [
                    'url' => Storage::url($ruta),
                    'id' => $pdfModel->id
                ]
            ], 201);
    
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Error al generar el PDF',
                'error' => $e->getMessage(),
            ], 400);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(PDF $pdf)
    {
        return $this->sendResponse(new PDFResource($pdf), 'PDF recuperado con éxito.', 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePDFRequest $request, PDF $pdf)
    {
        try{
            $validated = $request->validated();
            $pdf->update($validated);

            return $this->sendResponse(new PDFResource($pdf), 200);
        }catch (\Exception $e) {
            return $this->sendError(['message' => $e->getMessage()], $e->status ?? 400);
        }
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PDF $pdf)
    {
        try{
            $usuario = auth()->user();
            if (!in_array($usuario->rol, [Rol::Admin, Rol::Junta, Rol::Monitor])) {
                return $this->sendError(['message' => 'No tienes permiso para eliminar este evento.'], 403);
            }
            $pdf->delete();
            return $this->sendResponse([], 204);
        }catch (\Exception $e) {
            return $this->sendError(['message' => $e->getMessage()], $e->status ?? 400);
        }
    }

}
