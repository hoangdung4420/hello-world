<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Position extends Model
{
    protected $table = 'job_levels';
    protected $primaryKey = 'id_joblevel';
    protected $fillable = ['name'];
    public $timestamps = false;
}
