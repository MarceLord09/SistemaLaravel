<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Escala;
use App\Models\Concepto;
use App\Models\ConceptoEscala;
class ConceptoEscalaController extends Controller
{
    const PAGINATION = 10;
    public function index(){
        // Cargar relaciones escala y concepto junto con los datos de conceptoEscala
        $conceptoEscala = ConceptoEscala::where('estado', '=', '1')->get();
        return view('conceptoEscala.index', compact('conceptoEscala'));
    }
    // BUSQUEDA POR ID
    public function openConceptoEscala(Request $request){
        $buscarConcepto = $request->get('buscarConcepto');
        $conceptoEscala = ConceptoEscala::where('estado', '=', '1')->where('idEscalaConcepto', 'LIKE', "%$buscarConcepto%")->paginate($this::PAGINATION);
        return view('mantenedor.concepto_escala.index', compact('conceptoEscala', 'buscarConcepto'));
    }

    public function create(){
        $escala = Escala::where('estado', '=', '1')->get();
        $concepto = Concepto::where('estado', '=', '1')->get();
        return view('mantenedor.concepto_escala.create', compact('escala', 'concepto'));
    }

    public function store(Request $request){
        $data = request()->validate(
            ['idEscala' => 'required|max:30',
             'idConcepto' => 'required|min:0',
            ],
            ['idEscala.required' => 'Seleccione la escala',
             'idConcepto.required' => 'Seleccione el concepto'
            ]);

        $monto = 0;
        switch ($request->idEscala) {
            case 1:
                $monto = 800;
                break;
            case 2:
                $monto = 750;
                break;
            case 3:
                $monto = 700;
                break;
            case 4:
                $monto = 650;
                break;
            case 5:
                $monto = 600;
                break;
            default:
                $monto = 800;
                break;
        }
        $conceptoEscala = new ConceptoEscala();
        $conceptoEscala->idEscala = $request->idEscala;
        $conceptoEscala->idConcepto = $request->idConcepto;
        $conceptoEscala->monto = $monto;
        $conceptoEscala->estado = '1';
        $conceptoEscala->save();
        return redirect()->route('conceptoEscala.index')->with('datos', 'Registro nuevo guardado!');
    }
    public function edit(string $id){
        $conceptoEscala = ConceptoEscala::findOrFail($id);
        $escala = Escala::where('estado', '=', '1')->get();
        $concepto = Concepto::where('estado', '=', '1')->get();
        return view('mantenedor.concepto_escala.edit', compact('conceptoEscala', 'escala', 'concepto'));
    }

    public function update(Request $request, string $id){
        $data = request()->validate(
            ['idEscala' => 'required|max:30',
             'idConcepto' => 'required|min:0',
            ],
            [ 'idEscala.required' => 'Seleccione la escala',
              'idConcepto.required' => 'Seleccione el concepto'
            ]);
        $monto = 0;
        switch ($request->idEscala) {
            case 1:
                $monto = 800;
                break;
            case 2:
                $monto = 750;
                break;
            case 3:
                $monto = 700;
                break;
            case 4:
                $monto = 650;
                break;
            case 5:
                $monto = 600;
                break;
            default:
                $monto = 800;
                break;
        }
        $conceptoEscala = ConceptoEscala::findOrFail($id);
        $conceptoEscala->idEscala = $request->idEscala;
        $conceptoEscala->idConcepto = $request->idConcepto;
        $conceptoEscala->monto = $monto;
        $conceptoEscala->estado = '1';
        $conceptoEscala->save();
        return redirect()->route('conceptoEscala.index')->with('datos', 'Registro guardado!');
    }

    public function confirmar($id){
        $conceptoEscala = ConceptoEscala::findOrFail($id);
        return view('mantenedor.concepto_escala.confirmar', compact('conceptoEscala'));
    }
    public function destroy(string $id){
        $conceptoEscala = ConceptoEscala::findOrFail($id);
        $conceptoEscala->estado = '0';
        $conceptoEscala->save();
        return redirect()->route('conceptoEscala.index')->with('datos', 'Registro Eliminado');
    }

    //  public function openConceptoEscal(Request $request){
    //      $buscarConcepto = $request->get('buscarConcepto');

    //      $conceptoEscala = ConceptoEscala::with('concepto')::whereHas('conceptoEscalas', function($query) use ($buscarConcepto){
    //               $query->where('tipoConcepto', 'like', '%' . $buscarConcepto . '%');
    //           })->get();
    //      return view('mantenedor.concepto_escala.index', compact('conceptoEscala', 'buscarConcepto'));
    //    }

}
