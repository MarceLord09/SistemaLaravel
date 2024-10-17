<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Deuda; 

class Condonacion extends Model
{
    use HasFactory;
    protected $table = 'condonacion';
    protected $primaryKey = 'idCondonacion';
    public $timestamps = false;
    protected $fillable = ['idDeuda', 'fecha', 'observacion', 'estado'];

    public function deuda(){
        return $this->belongsTo(Deuda::class, 'idDeuda');
    }
}
