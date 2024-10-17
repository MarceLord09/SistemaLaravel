<?php

namespace App\Http\Controllers;
use App\Models\Escala;
use Illuminate\Http\Request;
use App\Models\AsignarEscala; 
use Barryvdh\DomPDF\Facade\Pdf;

class EscalaController extends Controller
{
    const PAGINATION = 10;
    public function index()
    {
       $escala = Escala::where('estado','=','1')->get();
       return view('escalas.index',compact('escala')); 
    }
    public function pdf(){
        $escala=Escala::all();
        $pdf = Pdf::loadView('mantenedor.escala.pdf', compact('escala'));
        return $pdf->download('Reporte Escala.pdf');
    }

    public function openEscala(Request $request){
        $buscarEscala = $request->get('buscarEscala');
        $escala = Escala::where('estado', '=', '1')->where('tipoEscala', 'like', '%' . $buscarEscala . '%')->paginate($this::PAGINATION);
        return view('mantenedor.escala.index', compact('escala', 'buscarEscala'));
    }
    public function create()
    {
        return view('mantenedor.escala.create');   
    }

    public function store(Request $request)
    {
        $data = request()->validate(
        [
            'tipoEscala' => 'required|string|min:1|max:1',
            'descripcion' => 'required|max:60',
        ], 
        [
            'tipoEscala.required' => 'Ingrese tipo de escala',
            'descripcion.required' => 'Ingrese descripcion', 
        ]);
        $escala= new Escala();
        $escala->tipoEscala = $request -> tipoEscala;
        $escala->descripcion = $request -> descripcion;
        $escala->estado='1';
        $escala->save();

        return redirect()->route('escalas.index')->with('datosEscala', 'Escala Guardada!') ;
    }

    public function edit($idEscala)
    {
        $escala = Escala::findOrFail($idEscala);
        return view ('mantenedor.escala.edit', compact('escala'));
    }

    public function update(Request $request, $idEscala)
    {
        $data = request()->validate(
            [
                'tipoEscala' => 'required|string|min:1|max:1',
                'descripcion' => 'required|max:60',
            ], 
            [
                'tipoEscala.required' => 'Ingrese tipo de escala',
                'descripcion.required' => 'Ingrese descripcion',
            ]);
            $escala= Escala::findOrFail($idEscala);
            $escala->tipoEscala = $request -> tipoEscala;
            $escala->descripcion = $request -> descripcion;
            $escala->estado='1';
            $escala->save();
    
            return redirect()->route('escalas.index')->with('datosEscala', 'Escala Actualizada!') ; 
    }

    public function confirmar($idEscala){
        $escala = Escala::findOrFail($idEscala);
        return view('mantenedor.escala.confirmar',compact('escala'));
    }

    public function destroy($idEscala)
    {
        $escala = Escala::findOrFail($idEscala);
        $escala->estado='0';
        $escala->save();
        return redirect()->route('escalas.index')->with('datosEscala','Escala Eliminada');
    }
}

