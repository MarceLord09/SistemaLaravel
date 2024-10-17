<?php

namespace App\Http\Controllers;
use App\Models\Recibo;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class ReciboController extends Controller
{
    const PAGINATION = 10;
    public function index()
    {
        $recibo = Recibo::all();
        return view('mantenedor.recibo.index',compact('recibo')); 
    }
    public function pdf(){
        $recibo=Recibo::all();
        $pdf = Pdf::loadView('mantenedor.recibo.pdf', compact('recibo'));
        return $pdf->download('Reporte Recibo.pdf');
    }

    public function openRecibo(Request $request){
        $buscarRecibo = $request->get('buscarRecibo');
        $recibo = Recibo::where('estado', '=', '1')->where('concepto', 'like', '%' . $buscarRecibo . '%')->paginate($this::PAGINATION);
        return view('mantenedor.recibo.index', compact('recibo', 'buscarRecibo'));
    }
    public function create()
    {
        return view('mantenedor.recibo.create');   
    }

    public function store(Request $request)
    {
        $request->validate([
            'idRecibo' => 'required|unique:recibo,idRecibo',
            'fecha' => 'required|date',
            'concepto' => 'required|string|max:60',
            'monto' => 'required|numeric',
        ]);

        // Create a new Recibo
        $recibo = new Recibo();
        $recibo->idRecibo = $request->idRecibo;
        $recibo->fecha = $request->fecha;
        $recibo->concepto = $request->concepto;
        $recibo->monto = $request->monto;
        $recibo->estado='1';

        $recibo->save(); // Save the Recibo to the database

        // Redirect back or to a success page
        return redirect()->route('recibo.index')->with('datosRecibo', 'Recibo creado exitosamente.');
    }

    public function edit($idRecibo)
    {
        $recibo = Recibo::findOrFail($idRecibo);
        return view ('mantenedor.recibo.edit', compact('recibo'));
    }

    public function update(Request $request, $idRecibo)
    {
        $data = request()->validate(
            [
                'tipoRecibo' => 'required|string|min:1|max:1',
                'descripcion' => 'required|max:60',
            ], 
            [
                'tipoRecibo.required' => 'Ingrese tipo de recibo',
                'descripcion.required' => 'Ingrese descripcion',
            ]);
            $recibo= Recibo::findOrFail($idRecibo);
            $recibo->tipoRecibo = $request -> tipoRecibo;
            $recibo->descripcion = $request -> descripcion;
            $recibo->estado='1';
            $recibo->save();
    
            return redirect()->route('recibo.index')->with('datosRecibo', 'Recibo Actualizada!') ; 
    }

    public function confirmar($idRecibo){
        $recibo = Recibo::findOrFail($idRecibo);
        return view('mantenedor.recibo.confirmar',compact('recibo'));
    }

    public function destroy($idRecibo)
    {
        $recibo = Recibo::findOrFail($idRecibo);
        $recibo->estado='0';
        $recibo->save();
        return redirect()->route('recibo.index')->with('datosRecibo','Recibo Eliminada');
    }
}
