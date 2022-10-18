<?php

namespace iutnc\tweeterapp\model;

class User extends \Illuminate\Database\Eloquent\Model{
    protected $table='user';
    protected $primarykey='id';
    public $timestamps=false;

    public function tweets(){
        return $this->hasMany('\iutnc\tweeterapp\model\Tweet','author');
    }
    public function liked(){
        return $this->belongsToMany('\iutnc\tweeterapp\model\Tweet','\iutnc\tweeterapp\model\Like','user_id','tweet_id');
    }
    public function followedBy(){
        return $this->belongsToMany('\iutnc\tweeterapp\model\User','\iutnc\tweeterapp\model\Follow','followee','follower');//ou inverse
    }
    public function follows(){
        return $this->belongsToMany('\iutnc\tweeterapp\model\User','\iutnc\tweeterapp\model\Follow','follower','followee');//ou inverse
    }
}
