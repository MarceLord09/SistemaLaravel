<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recibo extends Model
{
    use HasFactory;
    protected $table = 'recibo'; 
    protected $primaryKey = 'idRecibo'; 
    public $timestamps=false; 
    protected $fillable=['fecha', 'concepto', 'monto','estado'];
}
