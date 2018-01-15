<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table = 'comments';
    protected $primaryKey = 'id_comment';
    protected $fillable = [	'fullname','email','job_id','parent_id','content','status','created_at','updated_at'];
}
