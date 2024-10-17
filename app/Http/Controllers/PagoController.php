<?php

namespace App\Http\Controllers;

use App\Models\Pago;
use App\Models\Deuda;
use Illuminate\Http\Request;

class PagoController extends Controller
{
    const PAGINATION = 10;

    public function index()
    {
        
        $pago = Pago::paginate(self::PAGINATION);
        return view('pago.index', compact('pago'));
    }

    // Method to handle searching and pagination
    public function openPago(Request $request)
    {
        $buscarpor = $request->get('buscarpor'); // Get the search term

        $pago = Pago::select('pago.*', 'alumno.primerNombre', 'alumno.apellidoPaterno') // Select relevant columns
            ->join('deuda', 'pago.idDeuda', '=', 'deuda.idDeuda') // Ensure this column exists
            ->join('asignar_escala', 'deuda.idAsignarEscala', '=', 'asignar_escala.idAsignarEscala') // Ensure this column exists
            ->join('alumno', 'asignar_escala.idAlumno', '=', 'alumno.idAlumno')
            ->where(function($query) use ($buscarpor) {
                $query->where('alumno.primerNombre', 'like', '%' . $buscarpor . '%')
                      ->orWhere('alumno.apellidoPaterno', 'like', '%' . $buscarpor . '%');
            })
            ->paginate(self::PAGINATION); // Use defined pagination constant

        return view('mantenedor.pago.index', compact('pago', 'buscarpor'));
    }

    // Method to handle debt payment
    public function pago(Request $request, $idDeuda)
    {
        // Encuentra la deuda por ID
        $deuda = Deuda::findOrFail($idDeuda);
    
        // Registra el pago
        $pago = new Pago();
        $pago->idDeuda = $deuda->idDeuda;
        $pago->fecha = now(); // Fecha actual
        $pago->monto = $deuda->montoTotal; // O el monto del pago que se realiza
        $pago->estado = '1'; // Estado del pago (puede ser 1 para 'pagado')
    
        // Guardar el pago
        $pago->save();
    
        // Actualiza el estado de la deuda
        $deuda->montoTotal = 0;
        $deuda->estado = '1'; // Marca como pagada
        $deuda->save();
    
        // Redirige a la lista de deudas con un mensaje de éxito
        return redirect()->route('deudas.index')->with('success', 'Deuda condonada exitosamente');
    }
    

    // Method to confirm a payment
    public function confirmar($id)
    {
        $pago = Pago::findOrFail($id);
        return view('mantenedor.pago.confirmar', compact('pago'));
    }

    // Method to delete (soft delete) a payment
    public function destroy($id)
    {
        $pago = Pago::findOrFail($id);
        $pago->estado = '0'; // Mark as deleted or inactive
        $pago->save();
        
        return redirect()->route('pago.index')->with('datos', 'Pago Eliminado');
    }
}
