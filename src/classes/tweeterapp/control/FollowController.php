<?php

namespace iutnc\tweeterapp\control;

use \iutnc\mf\control\AbstractController;
use \iutnc\tweeterapp\model\Tweet;
use \iutnc\tweeterapp\model\Follow;
use \iutnc\tweeterapp\model\User;
use \iutnc\mf\auth\AbstractAuthentification;
use \iutnc\mf\router\Router;

class FollowController extends AbstractController{
    public function execute():void{
        if(isset($this->request->get['action'])){
            $choice=$this->request->get['action'];
            $id_to_follow=$this->request->get['id'];
            $user=User::where('id','=',$id_to_follow)->first();
            if($choice==='follow_user'){
                if(!(Follow::where('follower','=',AbstractAuthentification::connectedUser())->where('followee','=',$id_to_follow)->exists())){
                    $follow=new Follow();
                    $follow->follower=AbstractAuthentification::connectedUser();
                    $follow->followee=$id_to_follow;
                    $follow->save();
                    $user->followers++;
                    $user->save();
                    Router::executeRoute('following');
                }
                else{
                    Router::executeRoute('following');
                }
            }
            if($choice==='unfollow_user'){
                echo 'unfollow';
            }
        }
    }
}