<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Deuda;
use App\Models\Alumno;

class DeudaController extends Controller
{
    const PAGINATION = 10;

    public function index(){
        // Obtener todas las deudas
        $deuda = Deuda::with(['asignarEscala', 'conceptoEscala'])->get();
        // Retornar la vista con las deudas
        return view('mantenedor.deuda.index', compact('deuda'));
    }

    public function openDeuda(Request $request) {
        $buscarpor = $request->get('buscarpor');
    
        $deuda = Deuda::select('deuda.*')
            ->join('asignar_escala', 'deuda.idAsignarEscala', '=', 'asignar_escala.idAsignarEscala')
            ->join('alumno', 'asignar_escala.idAlumno', '=', 'alumno.idAlumno')
            ->where('deuda.estado', '=', '1')
            ->where(function($query) use ($buscarpor) {
                $query->where('alumno.primerNombre', 'like', '%' . $buscarpor . '%')
                      ->orWhere('alumno.apellidoPaterno', 'like', '%' . $buscarpor . '%');
            })
            ->paginate($this::PAGINATION);
    
        return view('mantenedor.deuda.index', compact('deuda', 'buscarpor'));
    }
    

    // public function openDeuda(Request $request){
    //     $buscarpor = $request->get('buscarpor');
    //     $deuda = Deuda::where('estado', '=', '1')->where('idAsignarEscala', 'like', '%' . $buscarpor . '%')->paginate($this::PAGINATION);
    //     return view('mantenedor.deuda.index', compact('deuda', 'buscarpor'));
    // }
  

    // public function mostrarDeuda($idAlumno){
    //     // Obtén todas las deudas con sus relaciones asignarEscala
    //     $deuda = Deuda::with('asignarEscala')->get();

    //     // Filtra las deudas en PHP
    //     $deudasFiltradas = $deuda->filter(function($deuda) use ($idAlumno) {
    //         return $deuda->asignarEscala && $deuda->asignarEscala->alumno_id == $idAlumno;
    //     });

    //     // Pagina los resultados filtrados manualmente
    //     $perPage = self::PAGINATION;
    //     $page = request()->get('page', 1);
    //     $total = $deudasFiltradas->count();
    //     $results = $deudasFiltradas->slice(($page - 1) * $perPage, $perPage)->values();
    //     $deudasPaginadas = new \Illuminate\Pagination\LengthAwarePaginator($results, $total, $perPage, $page, [
    //         'path' => \Illuminate\Pagination\Paginator::resolveCurrentPath(),
    //     ]);

    //     return view('mantenedor.deuda.index', ['deuda' => $deudasPaginadas]);
    // }


    
}

