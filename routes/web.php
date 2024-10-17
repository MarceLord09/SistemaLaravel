<?php
use illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AlumnoController;
use App\Http\Controllers\DeudaController;
use App\Http\Controllers\EscalaController;
use App\Http\Controllers\CondonacionController;
use App\Http\Controllers\ConceptoController;
use App\Http\Controllers\AsignarEscalaController;
use App\Http\Controllers\ConceptoEscalaController;
use App\Http\Controllers\ReciboController;
use App\Http\Controllers\PagoController;


Auth::routes();

Route::middleware(['auth', 'verified'])->group(function () {
    Route::post('/recibo/store', [ReciboController::class, 'store'])->name('recibo.store');

    Route::get('/recibo',[ReciboController::class, 'openRecibo'])->name('recibo.index');

  

    Route::get('mantenedor/users/{user}/edit', [UserController::class, 'edit'])->name('mantenedor.users.edit');
    Route::get('alumno/pdf', [AlumnoController::class, 'pdf'])->name('alumno.pdf');
    Route::get('recibo/pdf', [ReciboController::class, 'pdf'])->name('recibo.pdf'); 
    Route::get('escala/pdf', [EscalaController::class, 'pdf'])->name('escala.pdf');
    Route::get('concepto/pdf',[ConceptoController::class, 'pdf'])->name('concepto.pdf');
    Route::get('users/pdf' , [UserController::class, 'pdf'])->name('users.pdf');
    Route::get('/', [HomeController::class, 'index'])->name('home.index');


    Route::resource('users', UserController::class);
    Route::get('/users', [UserController::class, 'index'])->name('users.index');
    Route::get('/users/{id}/confirmar', [UserController::class, 'confirmar'])->name('users.confirmar');
    Route::get('/cancelar', function () {
        return redirect()->route('users.index')->with('datos', 'Acción Cancelada ..!');
    })->name('cancelarUser');

    Route::resource('alumno', AlumnoController::class);
    Route::get('/alumno', [AlumnoController::class, 'openAlumno'])->name('alumno.index');
    Route::get('/alumno/{idAlumno}/confirmar', [AlumnoController::class, 'confirmar'])->name('alumno.confirmar');
    Route::get('/cancelarAlumno', function () {
        return redirect()->route('alumno.index')->with('datos', 'Acción Cancelada ..!');
    })->name('cancelarAlumno');

    Route::resource('concepto', ConceptoController::class);
    Route::get('/concepto', [ConceptoController::class, 'openConcepto'])->name('concepto.index');
    Route::get('/concepto/{idConcepto}/confirmar', [ConceptoController::class, 'confirmar'])->name('concepto.confirmar');
    Route::get('/cancelarConcepto', function () {
        return redirect()->route('concepto.index')->with('datosConcepto', 'Acción Cancelada');
    })->name('cancelarConcepto');


    Route::resource('escalas', EscalaController::class);
    Route::get('/escalas', [EscalaController::class, 'openEscala'])->name('escalas.index');
    Route::get('/escalas/{idEscala}/confirmar', [EscalaController::class, 'confirmar'])->name('escalas.confirmar');
    Route::get('/cancelarEscala', function () {
        return redirect()->route('escala.index')->with('datosEscala', 'Acción Cancelada');
    })->name('cancelarEscala');

    Route::resource('deudas', DeudaController::class)->names('admin.deudas');
    Route::get('/deudas/{idDeuda}/confirmar', [DeudaController::class, 'confirmar'])->name('admin.deudas.confirmar');
    Route::get('/cancelarDeuda', function () {
        return redirect()->route('admin.deudas.index')->with('datosDeuda', 'Acción Cancelada');
    })->name('cancelarDeuda');
    Route::get('/deudas', [DeudaController::class, 'openDeuda'])->name('admin.deudas.index');

    // CONCEPTO ESCALA 
    Route::resource('conceptoEscala', ConceptoEscalaController::class);
    Route::get('/conceptoEscala', [ConceptoEscalaController::class, 'openConceptoEscala'])->name('conceptoEscala.index');
    Route::get('/conceptoEscala/{idEscalaConcepto}/confirmar', [ConceptoEscalaController::class, 'confirmar'])->name('conceptoEscala.confirmar');
    Route::get('/cancelarConceptoEscala', function () {
        return redirect()->route('conceptoEscala.index')->with('datos', 'Acción Cancelada');
    })->name('cancelarConceptoEscala');

    //ASIGNAR ESCALA
    Route::resource('asignar', AsignarEscalaController::class);
    Route::get('/asignar', [AsignarEscalaController::class, 'openAsignar'])->name('asignar.index');
    Route::get('/asignar/{idAsignarEscala}/confirmar', [AsignarEscalaController::class, 'confirmar'])->name('asignar.confirmar');
    Route::get('/cancelarAsignar', function () {
        return redirect()->route('asignar.index')->with('datos', 'Acción Cancelada');
    })->name('cancelarAsignar');

    //DEUDA
    Route::resource('deudas', DeudaController::class); 
    Route::get('/deudas', [DeudaController::class, 'openDeuda'])->name('deudas.index');
    //Route::get('/deuda', [DeudaController::class, 'index']);
    //Route::get('/deudas/{idAlumno}', [DeudaController::class, 'mostrarDeuda'])->name('deuda.mostrar');

//  RECIBO
    Route::resource('recibo', ReciboController::class);
    Route::get('/recibo', [ReciboController::class, 'openRecibo'])->name('recibo.index');
    Route::get('/recibo/{idRecibo}/confirmar', [ReciboController::class, 'confirmar'])->name('recibo.confirmar');
    Route::get('/cancelarRecibo', function () {
        return redirect()->route('recibo.index')->with('datosRecibo', 'Acción Cancelada');
    })->name('cancelarRecibo');


    Route::resource('condonacion', CondonacionController::class);
    Route::get('/condonacion', [CondonacionController::class, 'openCondonacion'])->name('condonacion.index');
    Route::get('/deudas/condonar/{id}', [CondonacionController::class, 'condonar'])->name('condonarDeuda');
    
    Route::resource('pago', PagoController::class);
    Route::get('/pago', [PagoController::class, 'openPago'])->name('pago.index');
    Route::get('/deudas/pago/{id}', [PagoController::class, 'pago'])->name('pagoDeuda');
    Route::get('/cancelarPago', function () {
        return redirect()->route('pago.index')->with('datos', 'Acción Cancelada');
    })->name('cancelarPago');

});
