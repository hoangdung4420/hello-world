<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class About extends Model
{
    protected $table = 'abouts';
    protected $primaryKey = 'id_about';
    protected $fillable = ['title','detail','social','created_at','updated_at'];
}
