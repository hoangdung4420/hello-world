<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ListJob extends Model 
{
    protected $table = 'list_jobs';
    protected $primaryKey = 'id_listjob';
    protected $fillable = ['job_id','user_id','cv_file','status','note','created_at','updated_at'];
}
