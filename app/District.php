<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    protected $table = 'districts';
    protected $primaryKey = 'id_district';
    protected $fillable = ['name','type','province_id'];
    public $timestamps = false;
}
