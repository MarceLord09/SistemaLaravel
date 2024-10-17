<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Concepto;
use Barryvdh\DomPDF\Facade\Pdf;

class ConceptoController extends Controller
{
     
    const PAGINATION = 10;
    public function pdf(){
        $concepto=Concepto::all();
        $pdf = Pdf::loadView('mantenedor.concepto.pdf', compact('concepto'));
        return $pdf->download('Reporte Concepto.pdf');
    
    }
    public function index()
    {
       $concepto = Concepto::where('estado','=','1')->get();
       return view('concepto.index',compact('concepto')); 
    }

    public function openConcepto(Request $request){
        $buscarConcepto = $request->get('buscarConcepto');
        $concepto = Concepto::where('estado', '=', '1')->where('tipoConcepto', 'like', '%' . $buscarConcepto . '%')->paginate($this::PAGINATION);
        return view('mantenedor.concepto.index', compact('concepto', 'buscarConcepto'));
    }

    public function create()
    {
        return view('mantenedor.concepto.create');   
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = request()->validate(
            [
                'tipoConcepto' => 'required|string|max:60',
                'descripcion' => 'required|max:50',
            ], 
            [
                'tipoConcepto.required' => 'Ingrese tipo de concepto',
                'descripcion.required' => 'Ingrese descripcion', 
            ]);
            $concepto= new Concepto();
            $concepto->tipoConcepto = $request -> tipoConcepto;
            $concepto->descripcion = $request -> descripcion;
            $concepto->estado='1';
            $concepto->save();
    
            return redirect()->route('concepto.index')->with('datosConcepto', 'Concepto Guardado!') ;
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $idConcepto)
    {
        $concepto = Concepto::findOrFail($idConcepto);
        return view ('mantenedor.concepto.edit', compact('concepto'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $idConcepto)
    {
        $data = request()->validate(
            [
                'tipoConcepto' => 'required|string|max:60',
                'descripcion' => 'required|max:50',
            ], 
            [
                'tipoConcepto.required' => 'Ingrese tipo de concepto',
                'descripcion.required' => 'Ingrese descripcion', 
            ]);
            $concepto= Concepto::findOrFail($idConcepto);
            $concepto->tipoConcepto = $request -> tipoConcepto;
            $concepto->descripcion = $request -> descripcion;
            $concepto->estado='1';
            $concepto->save();
    
            return redirect()->route('concepto.index')->with('datosConcepto', 'Concepto Actualizada!') ; 
            
    }

    public function confirmar($idConcepto){
        $concepto = Concepto::findOrFail($idConcepto);
        return view('mantenedor.concepto.confirmar',compact('concepto'));
    }

    public function destroy(string $idConcepto)
    {
        $concepto = Concepto::findOrFail($idConcepto);
        $concepto->estado='0';
        $concepto->save();
        return redirect()->route('concepto.index')->with('datosConcepto','Registro Eliminado');
    
    }
}
