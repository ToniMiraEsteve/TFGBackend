<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\StorePDFRequest;
use App\Http\Requests\UpdatePDFRequest;
use App\Models\PDF;
use Illuminate\Http\Request;
use App\Http\Resources\PDFResource;

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
        try{
            $validated = $request->validated();
            $alert = PDF::create($validated);
            return $this->sendResponse(new PDFResource($alert), 201);
        }catch (\Exception $e) {
            return $this->sendError(['message' => $e->getMessage()], $e->status ?? 400);
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
            $pdf->delete();
            return $this->sendResponse([], 204);
        }catch (\Exception $e) {
            return $this->sendError(['message' => $e->getMessage()], $e->status ?? 400);
        }
    }
}
