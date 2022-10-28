<?php

namespace iutnc\tweeterapp\control;

use \iutnc\mf\control\AbstractController;
use \iutnc\tweeterapp\model\Tweet;
use \iutnc\tweeterapp\model\Like;
use \iutnc\mf\auth\AbstractAuthentification;
use \iutnc\mf\router\Router;

class LikeController extends AbstractController{
    public function execute():void{
        if(isset($this->request->get['action'])){
            $choice=$this->request->get['action'];
            $id=$this->request->get['id'];
            $t=Tweet::select()->where('id','=',$id)->first();
            if($choice==='like_tweet'){
                // echo $t;
                if(!(Like::where('user_id','=',AbstractAuthentification::connectedUser())->where('tweet_id','=',$id)->exists())){
                    $like=new Like();
                    $like->user_id=AbstractAuthentification::connectedUser();
                    $like->tweet_id=$id;
                    $like->save();
                    $t->score++;
                    $t->save();
                    Router::executeRoute('view');
                }else{
                    Router::executeRoute('view');
                }
            }
            if($choice==='dislike_tweet'){
                $liked=Like::where('user_id','=',AbstractAuthentification::connectedUser())->where('tweet_id','=',$id);
                if(Like::where('user_id','=',AbstractAuthentification::connectedUser())->where('tweet_id','=',$id)->exists()){
                    $t->score--;
                    $t->save();
                    $liked->delete();
                    Router::executeRoute('view');
                }else{
                    Router::executeRoute('view');
                }
            }
        }
    }
}