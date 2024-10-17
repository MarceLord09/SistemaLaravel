<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Concepto;

class ConceptoEscala extends Model
{
    use HasFactory;
    protected $table = 'concepto_escala';
    protected $primaryKey = 'idEscalaConcepto';
    public $timestamps = false;
    protected $fillable = ['idEscala', 'idConcepto', 'monto', 'estado'];

    public function escala(){
        return $this->belongsTo(Escala::class, 'idEscala');
    }

    public function concepto()
    {
        return $this->belongsTo(Concepto::class, 'idConcepto');
    }

    public function deuda(){
        return $this->hasMany(Deuda::class, 'idEscalaConcepto', 'idEscalaConcepto'); 
    }
}
