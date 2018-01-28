<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Follow extends Model
{
    protected $table = 'follows';
    protected $primaryKey = 'id_follow';
    protected $fillable = ['company_id','user_id','created_at','updated_at',];
}
