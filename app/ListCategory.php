<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ListCategory extends Model
{
    protected $table = 'list_categories';
    protected $primaryKey = 'id_listcat';
    protected $fillable = ['user_id', 'jobcat_id', 'created_at', 'updated_at'];
    public $timestamps = false;
}
