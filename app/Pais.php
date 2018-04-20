<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pais extends Model
{
    protected $table = 'Pais';

    protected $primaryKey = 'id';
    protected $keyType = 'int';

    public $timestamps = false;

    //$pais->regiones
    public function regiones(){
    	return $this->hasMany(Region::class);
    }
}
