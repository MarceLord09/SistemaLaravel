<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Condonacion; 
use App\Models\Pago; 

class Deuda extends Model
{
    use HasFactory;
    protected $table = 'deuda';
    protected $primaryKey = 'idDeuda';
    public $timestamps = false;
    protected $fillable = ['idDeuda','idAsignarEscala','idEscalaConcepto','montoTotal','fecha','estado'];

    //METODO BUSCAR Y ASIGNAR ---PENDIENTE
    // Momentaneo : selecciona el idalumno de un cbx / como buscar contacto
    // puede mostrar automatico a nombre y apellido adicional (POR VER, SERIA AGREGAR ESOS ATRIBUTOS A LA TABLA DEUDA)
  
    public  function asignarEscala(){
        return $this->belongsTo(AsignarEscala::class, 'idAsignarEscala', 'idAsignarEscala');
    }

    public function conceptoEscala(){
        return $this->hasOne(ConceptoEscala::class, 'idEscalaConcepto', 'idEscalaConcepto');
    }

    public function condonacion(){
        return $this->hasMany(Condonacion::class, 'idCondonacion', 'idCondonacion'); 
    }

    public function pago(){
        return $this->hasMany(Pago::class, 'idPago', 'idPago'); 
    }

}
