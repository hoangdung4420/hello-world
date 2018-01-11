<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'job_categories';
    protected $primaryKey = 'id_jobcat';
    protected $fillable = ['name', 'parent_id'];
    public $timestamps = false;
}
