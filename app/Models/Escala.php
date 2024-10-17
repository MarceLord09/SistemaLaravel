<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Escala extends Model
{
    use HasFactory;
    protected $table = 'escala'; 
    protected $primaryKey = 'idEscala';
    public $timestamps = false;
    protected $filiable = ['tipoEscala', 'descripcion','estado'];

    public function asignarEscala(){
        return $this ->hasMany(AsignarEscala::class, 'idEscala', 'idEscala'); 
    }

    public function conceptoEscala()
    {
        return $this->hasMany(ConceptoEscala::class, 'idEscala', 'idEscala');
    }
}
