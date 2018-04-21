<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Departamento extends Model
{
    protected $table = 'Departamento';

    protected $primaryKey = 'id';
    protected $keyType = 'int';

    public $timestamps = false;

    //$departamento->region
    public function region(){
    	return $this->belongsTo(Region::class, 'id_region');
    }
}
