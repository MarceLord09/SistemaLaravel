<?php

namespace App\Http\Controllers;

use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use App\Models\Alumno;
class AlumnoController extends Controller
{    const PAGINATION = 10;
    public function pdf(){
        $alumno=Alumno::all();
        $pdf = Pdf::loadView('mantenedor.alumno.pdf', compact('alumno'));
        return $pdf->download('Reporte Alumno.pdf');
    }
    public function index(){
        $alumno = Alumno::where('estado', '=', '1')->get();
        return view('alumno.index', compact('alumno'));
    }
    public function openAlumno(Request $request)
    {
        $buscarpor = $request->get('buscarpor');
        $alumno = Alumno::where('estado','=','1')
            ->where(function($query) use ($buscarpor){
                $query->where('apellidoPaterno', 'LIKE', "%$buscarpor%")
                ->orWhere('apellidoMaterno', 'LIKE', "%$buscarpor%")
                ->orWhere('primerNombre', 'LIKE', "%$buscarpor%")
                ->orWhere('idAlumno', 'LIKE', "%$buscarpor");
            })->paginate($this::PAGINATION);
            
        return view('mantenedor.alumno.index', compact('alumno','buscarpor'));
    }
    public function create()
    {
        return view('mantenedor.alumno.create');
    }

    public function store(Request $request){
        $data = request()->validate([
                'primerNombre' => 'required|max:15',
                'otrosNombres' => 'required|max:30',
                'apellidoMaterno' => 'required|max:30',
                'apellidoPaterno' => 'required|max:30',
                'anio' => 'required|max:20',
                'periodo' => 'required|numeric',
                'seccion' => 'required|string|min:1|max:1'
            ],
            [
                'primerNombre.required'=>'Ingrese el primer nombre',
                'otrosNombres.required'=>'Ingrese otros nombres',
                'apellidoMaterno.required'=>'Ingrese apellido materno',
                'apellidoPaterno.required'=>'Ingrese apellido paterno',
                'anio.required'=>'Ingrese año escolar',
                'periodo.required'=>'Ingrese el periodo',
                'seccion.required'=>'Ingrese seccion '
            ]);
            $alumno = new Alumno();
            $alumno->apellidoMaterno=$request->apellidoMaterno;
            $alumno->apellidoPaterno=$request->apellidoPaterno;
            $alumno->anio=$request->anio;
            $alumno->otrosNombres=$request->otrosNombres;
            $alumno->periodo=$request->periodo;
            $alumno->primerNombre=$request->primerNombre;
            $alumno->seccion=$request->seccion;
            $alumno->estado='1';
            $alumno->save();
            return redirect()->route('alumno.index')->with('datos', 'Registro Guardado!');        
    }

    public function edit($idAlumno){
        $alumno = Alumno::findOrFail($idAlumno);
        return view ('mantenedor.alumno.edit',compact('alumno'));
    }
    public function update(Request $request, $idAlumno)
    {
        $data = request()->validate([
                'primerNombre' => 'required|max:15',
                'otrosNombres' => 'required|max:30',
                'apellidoMaterno' => 'required|max:30',
                'apellidoPaterno' => 'required|max:30',
                'anio' => 'required|max:20',
                'periodo' => 'required|numeric',
                'seccion' => 'required|string|min:1|max:1'
            ],
            [
                'primerNombre.required'=>'Ingrese el primer nombre',
                'otrosNombres.required'=>'Ingrese otros nombres',
                'apellidoMaterno.required'=>'Ingrese apellido materno',
                'apellidoPaterno.required'=>'Ingrese apellido paterno',
                'anio.required'=>'Ingrese año escolar',
                'periodo.required'=>'Ingrese el periodo',
                'seccion.required'=>'Ingrese seccion '
            ]);
            $alumno = Alumno::findOrFail($idAlumno);
            $alumno->apellidoMaterno=$request->apellidoMaterno;
            $alumno->apellidoPaterno=$request->apellidoPaterno;
            $alumno->anio=$request->anio;
            $alumno->otrosNombres=$request->otrosNombres;
            $alumno->periodo=$request->periodo;
            $alumno->primerNombre=$request->primerNombre;
            $alumno->seccion=$request->seccion;
            $alumno->estado='1';
            $alumno->save();
            return redirect()->route('alumno.index')->with('datos','Registro Actualizado');
    }

    public function confirmar($idAlumno){
        $alumno = Alumno::findOrFail($idAlumno);
        return view('mantenedor.alumno.confirmar', compact('alumno'))  ;
    }

    public function destroy($idAlumno)
    {
         $alumno = Alumno::findOrFail($idAlumno);
         $alumno->estado='0';  
         $alumno->save(); 
         return redirect()->route('alumno.index')->with('datos', 'Registro Eliminado');
    }
}
