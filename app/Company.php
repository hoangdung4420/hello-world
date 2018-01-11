<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
	protected $table = 'detail_companies';
    protected $primaryKey = 'id_company';
    protected $fillable = ['user_id','size','address','preview','detail','benifit','feature','reader','finish','created_at','updated_at'];
   	
}
