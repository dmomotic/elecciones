<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Region extends Model
{
    protected $table = 'Region';

    protected $primaryKey = 'id';
    protected $keyType = 'int';

    public $timestamps = false;

    //$region->pais
    public function pais(){
    	return $this->belongsTo(Pais::class, 'id_pais');
    }

    //$region->departamentos
    public function departamentos(){
    	return $this->hasMany(Departamento::class);
    }
}
