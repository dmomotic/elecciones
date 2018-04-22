<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Municipio extends Model
{
    protected $table = 'Municipio';

    protected $primaryKey = 'id';
    protected $keyType = 'int';

    public $timestamps = false;

    //$municipio->departamento
    public function departamento(){
    	return $this->belongsTo(Departamento::class, 'id_departamento');
    }
}
