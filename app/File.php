<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class File extends Model
{ 
    protected $table = 'files';
    protected $primaryKey = 'id_file';
    protected $fillable = ['user_id','preview','education','skill','experience','reference','salary','job_level','times_id','benifit','cv_file','active','created_at','updated_at'];
}
