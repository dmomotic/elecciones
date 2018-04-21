<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoEleccion extends Model
{
    protected $table = 'Tipo_Eleccion';

    protected $primaryKey = 'id';
    protected $keyType = 'int';

    public $timestamps = false;

}
