<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Job extends Model 
{
    protected $table = 'jobs';
    protected $primaryKey = 'id_job';
    protected $fillable = ['user_id','title','job_level','job_categories','address','salary','time_id','preview','required','agency','email','phone','expired','active','reader','feature','created_at','updated_at'];
}
