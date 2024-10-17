<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pago extends Model
{
    use HasFactory;
    protected $table = 'pago';

    protected $primaryKey = 'idPago';
    public $timestamps = false;
    protected $filiable = ['idDeuda', 'fecha','observacion','monto', 'estado'];

    public function deuda(){
        return $this->belongsTo(Deuda::class, 'idDeuda');
    }
}
