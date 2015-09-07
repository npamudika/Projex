<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FinalizedProjects extends Model
{
    protected $table = 'finalizedProjects';
    protected $primaryKey = 'id';
    public $timestamps = false;
}
