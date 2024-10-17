<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AsignarEscala extends Model
{
    use HasFactory;
    protected $table = 'asignar_escala';
    protected $primaryKey = 'idAsignarEscala';
    public $timestamps = false;

    // falta comprobar si hay atributo fecha
    protected $fillable = ['idAlumno', 'idEscala','fecha', 'estado'];

    public function alumno(){
        return $this->belongsTo(Alumno::class, 'idAlumno', 'idAlumno');
    }

    public function escala(){
        return $this->hasOne(Escala::class,'idEscala', 'idEscala'); 
    }

    public function deuda(){
        return $this->hasMany(Deuda::class, 'idAsignarEscala','idAsignarEscala');
    }

}
