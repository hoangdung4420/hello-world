<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    protected $table = 'likes';
    protected $primaryKey = 'id_like';
    protected $fillable = ['oitem_id',	'user_id' ,'status','created_at','updated_at',];
    
    public function countJobLikes($id){
    	return $this->where('oitem_id',$id)->where('status',1)->count();
    }
    public function countJobDislikes($id){
    	return $this->where('oitem_id',$id)->where('status',0)->count();
    }

}
