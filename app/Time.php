<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Time extends Model
{
    protected $table = 'times';
    protected $primaryKey = 'id_time';
    protected $fillable = ['detail'];
    public $timestamps = false;
}
