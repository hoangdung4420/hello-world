<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Adv extends Model
{
    protected $table = 'advs';
    protected $primaryKey = 'id_adv';
    protected $fillable = ['name','picture','link','slice','active','created_at','updated_at'];
}
