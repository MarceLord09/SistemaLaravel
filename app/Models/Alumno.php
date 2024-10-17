<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alumno extends Model
{
    use HasFactory;
    protected $table = 'alumno';
    protected $primaryKey = 'idAlumno';
    public $timestamps = false;
    protected $fillable = ['primerNombre','otrosNombres','apellidoPaterno',
                            'apellidoMaterno','anio','seccion','periodo','estado'];

    public function asignarEscala(){
        return $this->hasMany(AsignarEscala::class, 'idAlumno', 'idAlumno'); 
    }

}
