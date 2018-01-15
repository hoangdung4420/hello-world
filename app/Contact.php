<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
 
class Contact extends Model
{
   protected $table = 'contacts';
   protected $primaryKey = 'id_contact';
   protected $fillables = ['fullname','email','rep_id','subject','content','status','parent_id','created_at','updated_at'];
}
