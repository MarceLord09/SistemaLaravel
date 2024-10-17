<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Concepto extends Model
{
    use HasFactory;
    protected $table = 'concepto';
    protected $primaryKey = 'idConcepto';
    public $timestamps = false;
    protected $fillable = ['tipoConcepto', 'descripcion', 'estado'];

    public function conceptoEscalas()
    {
        return $this->hasMany('App\Models\ConceptoEscala', 'idConcepto', 'idConcepto');
    }

}
