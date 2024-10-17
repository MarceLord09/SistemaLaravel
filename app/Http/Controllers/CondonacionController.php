<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Deuda; 
use App\Models\Condonacion; 

class CondonacionController extends Controller
{
    const PAGINATION = 10;
    public function index(){
        $condonacion = Condonacion::all();
        return view('condonacion.index', compact('condonacion'));
    }

   /* public function openCondonacion(Request $request){
        $buscarpor = $request->get('buscarpor');
        $condonacion = Condonacion::where('estado', '=', '1')->where('tipoEscala', 'like', '%' . $buscarEscala . '%')->paginate($this::PAGINATION);
        return view('mantenedor.escala.index', compact('escala', 'buscarEscala'));
    }*/

    public function openCondonacion(Request $request) {
        $buscarpor = $request->get('buscarpor');
    
        $condonacion = Condonacion::select('condonacion.*', 'alumno.primerNombre')
            ->join('deuda', 'condonacion.idDeuda', '=', 'deuda.idDeuda')
            ->join('asignar_escala', 'deuda.idAsignarEscala', '=', 'asignar_escala.idAsignarEscala')
            ->join('alumno', 'asignar_escala.idAlumno', '=', 'alumno.idAlumno')
            ->where(function($query) use ($buscarpor) {
                $query->where('alumno.primerNombre', 'like', '%' . $buscarpor . '%')
                      ->orWhere('alumno.apellidoPaterno', 'like', '%' . $buscarpor . '%');
            })
            ->paginate($this::PAGINATION);
    
        return view('mantenedor.condonacion.index', compact('condonacion', 'buscarpor'));
    }
    

    public function condonar($idDeuda)
    {
        // Buscar la deuda por su ID
        $deuda = Deuda::findOrFail($idDeuda);
        
        // Actualizar el monto a 0
        $deuda->montoTotal = 0;
        $deuda->estado = '1'; 
        $deuda->save();
    
        return redirect()->route('deudas.index')->with('success', 'Deuda condonada exitosamente');
    }
}
