<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reservations extends Model
{
    protected $table = 'reservations';
    protected $primaryKey = 'id';
    public $timestamps = false;
}
