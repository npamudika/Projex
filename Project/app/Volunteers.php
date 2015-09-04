<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Volunteers extends Model
{
    protected $table = 'volunteers';
    protected $primaryKey = 'id';
    public $timestamps = false;
}
