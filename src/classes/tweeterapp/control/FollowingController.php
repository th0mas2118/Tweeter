<?php

namespace iutnc\tweeterapp\control;
use \iutnc\mf\control\AbstractController;
use \iutnc\mf\router\Router;
use \iutnc\tweeterapp\model\User;
use \iutnc\mf\auth\AbstractAuthentification;
use \iutnc\tweeterapp\view\FollowingView;

class FollowingController extends AbstractController{
    public function execute():void{
        $user=User::select()->where('id','=',AbstractAuthentification::connectedUser())->first();
        $ul=$user->follows()->get();
        foreach($ul as $elem){
            echo $elem;
        }
        if(!isset($ul)){
        }
        $fv=new FollowingView($ul);
        $fv->makePage();
    }
}