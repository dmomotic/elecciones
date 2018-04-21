<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Poblacion extends Model
{
    protected $table = 'Poblacion';

    protected $primaryKey = 'id';
    protected $keyType = 'int';

    public $timestamps = false;
}
