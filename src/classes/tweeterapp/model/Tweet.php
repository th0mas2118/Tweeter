<?php

namespace iutnc\tweeterapp\model;

class Tweet extends \Illuminate\Database\Eloquent\Model{
    protected $table='tweet';
    protected $primarykey='id';
    public $timestamps=true;

    public function author(){
        return $this->belongsTo('\iutnc\tweeterapp\model\User','author');
    }

    public function likedBy(){
        return $this->belongsToMany('\iutnc\tweeterapp\model\User','\iutnc\tweeterapp\model\Like','tweet_id','user_id');
    }
}