<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Alumno;
use App\Models\Escala; 
use App\Models\AsignarEscala; 
use App\Models\ConceptoEscala;
use App\Models\Deuda; 

class AsignarEscalaController extends Controller
{
    const PAGINATION = 5;
    public function index(Request $request){
        $asignar = AsignarEscala::where('estado', '=', '1')->get();
        return view('asignar.index', compact('asignar'));
    }
    public function create()
    {
        $alumno = Alumno::where('estado', '=','1')->get(); 
        $escala = Escala::where('estado', '=', '1')->get();
        return view('mantenedor.asignar.create', compact('alumno', 'escala'));   
    } 
    public function openAsignar(Request $request)
    {
        $buscarpor = $request->get('buscarpor');
        $alumnosIds = Alumno::where('primerNombre', 'like', '%'. $buscarpor.'%')
            ->orWhere('apellidoPaterno', 'like', '%'. $buscarpor.'%')
            ->pluck('idAlumno');

        $asignar = AsignarEscala::whereIn('idAlumno', $alumnosIds)->paginate($this::PAGINATION);
        return view('mantenedor.asignar.index', compact('asignar','buscarpor'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'idAlumno' => 'required|exists:alumno,idAlumno',
            'idEscala' => 'required|exists:escala,idEscala',
            'fecha'=>'required|date'
        ],
        [
            'idAlumno.required'=>'Seleccione el ID',
            'idEscala.required' => 'Seleccione la escala',
            'fecha.required'=>'Ingrese fecha'
        ]);
        $asignar = new AsignarEscala();
        $asignar->idAlumno = $request -> idAlumno;
        $asignar->idEscala = $request -> idEscala;
        $asignar->fecha = $request -> fecha; 
        $asignar->estado = '1';
        $asignar->save();

        //Generar deudas basadas en la escala asignada
        $conceptoEscala = ConceptoEscala::where('idEscala', $request->idEscala)->get();
        foreach($conceptoEscala as $itemConceptoEscala){

            $fechaDeuda = null; //Inicializamos la fecha de deuda a null
                
            switch ($itemConceptoEscala->idConcepto) {
                case 1:
                    $fechaDeuda = '2024-03-01';
                    break;
                case 2:
                    $fechaDeuda = '2023-04-01';
                    break;
                case 3:
                    $fechaDeuda = '2023-05-01';
                    break;
                case 4:
                    $fechaDeuda = '2024-06-01';
                    break;
                case 5:
                    $fechaDeuda = '2024-07-01';
                    break;
                case 6:
                    $fechaDeuda = '2024-08-01';
                    break;
                case 7:
                    $fechaDeuda = '2024-09-01';
                    break;
                case 8:
                    $fechaDeuda = '2024-10-01';
                    break;
                case 9:
                    $fechaDeuda = '2024-11-01';
                    break;
                case 10:
                    $fechaDeuda = '2024-12-01';
                    break;
                default:
                    $fechaDeuda = $request->fecha; //Si no hay un caso definido, usamos la fecha del formulario
                    break;
                }
            
                Deuda::create([
                    'idEscalaConcepto' => $itemConceptoEscala->idEscalaConcepto,
                    'idAsignarEscala' => $asignar->idAsignarEscala,
                    'montoTotal' => $itemConceptoEscala->monto,
                    'fecha' => $fechaDeuda,
                    'estado' => '1'
                ]);
            }
            return redirect()->route('asignar.index')->with('datos', 'Asignacion Guardado');
        }


    public function edit($id){
        $asignar = AsignarEscala::findOrFail($id);
        $escala = Escala::where('estado', '=', '1')->get();
        $alumno = Alumno::where('estado', '=', '1')->get(); 
        return view ('mantenedor.asignar.edit', compact('asignar', 'escala', 'alumno'));
    }

    public function update(Request $request, string $id){
        $data=request()->validate([
           'idEscala' => 'required|numeric',
          'fecha'=>'required|date'
      ],
      [
          'idEscala.required' => 'Seleccione la escala',
          'fecha.required'=>'Ingrese fecha'
      ]);
      $asignar = AsignarEscala::findOrFail($id);
      $nuevaEscala = $request->idEscala;
      $fechacambio = $request->fecha;

      //Obtener deudas existentes a partir de la fecha de cambio
      $deuda = Deuda::where('idAsignarEscala', $asignar->idAsignarEscala)
                  -> where('fecha', '>=', $fechacambio)
                  -> get();

      //Actualizar deudas futuras
      foreach($deuda as $itemdeuda){
          $itemdeuda->estado = '0'; //Marcar deudas anteriores como inactivas
          $itemdeuda->save();

          //Crear nuevas deudas basadas en la nueva escala
          $conceptoEscala = ConceptoEscala::where('idEscala', $nuevaEscala)->get();
          foreach($conceptoEscala as $itemConceptoEscala){
              Deuda::create([
                  'idEscalaConcepto'=>$itemConceptoEscala->idEscalaConcepto,
                  'idAsignarEscala' => $asignar->idAsignarEscala,
                  'montoTotal'=>$itemConceptoEscala->monto,
                  'fecha'=>$itemdeuda->fecha,
                  'estado' =>'1'
              ]);
          }
      }

      $asignar->idEscala = $request -> idEscala;
      $asignar->fecha = $request -> fecha; 
      $asignar->estado = '1';
      $asignar->save();
      return redirect()->route('asignar.index')->with('datos', 'Escala modificada y deudas actualizadas');
  }
    

        /*
        public function update(Request $request, string $id){
            // Validar los datos del request
            $data = $request->validate([
                'idEscala' => 'required|numeric',
                'fecha' => 'required|date'
            ], [
                'idEscala.required' => 'Seleccione la escala',
                'fecha.required' => 'Ingrese fecha'
            ]);
        
            // Obtener el registro de asignar escala
            $asignar = AsignarEscala::findOrFail($id);
            $nuevaEscala = $request->idEscala;
            $fechacambio = $request->fecha;
        
            // Obtener deudas existentes con fecha posterior a la nueva fecha
            $deuda = Deuda::where('idAsignarEscala', $asignar->idAsignarEscala)
                        ->where('fecha', '>', $fechacambio)
                        ->get();
        
            // Actualizar deudas futuras con la nueva escala
            foreach ($deuda as $itemdeuda) {
                // Obtener el concepto de escala basado en la nueva escala
                $conceptoEscala = ConceptoEscala::where('idEscala', $nuevaEscala)
                                                ->where('idEscalaConcepto', $itemdeuda->idEscalaConcepto)
                                                ->first();
        
                if ($conceptoEscala) {
                    // Actualizar la deuda existente
                    $itemdeuda->montoTotal = $conceptoEscala->monto;
                    $itemdeuda->estado = '1'; // Marcar como activa si es necesario
                    $itemdeuda->save();
                }
            }
        
            // Actualizar la asignación de escala con la nueva fecha y escala
            $asignar->idEscala = $request->idEscala;
            $asignar->fecha = $request->fecha; 
            $asignar->estado = '1';
            $asignar->save();
        
            return redirect()->route('asignar.index')->with('datos', 'Escala modificada y deudas actualizadas');
        }
        */ 

//    public function update(Request $request, string $id){
//        $data=request()->validate([
//            'idEscala' => 'required|numeric',
//            'fecha'=>'required|date'
//        ],
//        [
//            'idAlumno.required'=>'Seleccione el ID',
//            'idEscala.required' => 'Seleccione la escala',
//            'fecha.required'=>'Ingrese fecha'
//        ]);
//        $asignar = AsignarEscala::findOrFail($id);
//        $asignar->idEscala = $request -> idEscala;
//        $asignar->fecha = $request -> fecha; 
//        $asignar->estado = '1';
//        $asignar->save();
//        return redirect()->route('asignar.index')->with('datos', 'Escala modificada y deudas actualizadas');
//    }

    public function confirmar($id){
        $asignar = AsignarEscala::findOrFail($id);
        return view('mantenedor.asignar.confirmar',compact('asignar'));
    }
    public function destroy(string $id){
        $asignar = AsignarEscala::findOrFail($id);
        $asignar->estado='0';
        $asignar->save();
        return redirect()->route('asignar.index')->with('datos','Registro Eliminado');
    }

}
