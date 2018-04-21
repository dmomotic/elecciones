<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Partido extends Model
{
    protected $table = 'Partido';

    protected $primaryKey = 'id';
    protected $keyType = 'int';

    public $timestamps = false;
}
