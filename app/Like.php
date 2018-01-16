<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    protected $table = 'likes';
    protected $primaryKey = 'id_like';
    protected $fillable = ['oitem_id',	'user_id','oitem','status','created_at','updated_at',];
    //oitem = 1laf company, = 2 là job
    public function countCompanyLikes($id){
    	return $this->where('oitem',1)->where('oitem_id',$id)->where('status',1)->count();
    }
    public function countCompanyDislikes($id){
    	return $this->where('oitem',1)->where('oitem_id',$id)->where('status',0)->count();
    }
    public function countJobLikes($id){
    	return $this->where('oitem',2)->where('oitem_id',$id)->where('status',1)->count();
    }
    public function countJobDislikes($id){
    	return $this->where('oitem',2)->where('oitem_id',$id)->where('status',0)->count();
    }

}
