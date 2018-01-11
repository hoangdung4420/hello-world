<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Province extends Model
{
    protected $table = 'provinces';
    protected $primaryKey = 'id_province';
    protected $fillable = ['name','type'];
    public $timestamps = false;
}
