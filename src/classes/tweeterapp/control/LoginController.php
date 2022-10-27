<?php

namespace iutnc\tweeterapp\control;

use \iutnc\mf\control\AbstractController;
use \iutnc\mf\router\Router;
use \iutnc\mf\auth\AbstractAuthentification;
use \iutnc\tweeterapp\view\LoginView;
use \iutnc\tweeterapp\auth\TweeterAuthentification;

class LoginController extends AbstractController{
    public function execute():void{
        if($this->request->method==='GET'){
            $lv=new LoginView();
            $lv->makePage();
        }
        if($this->request->method==='POST'){
            $u=$this->request->post;
            try{
                TweeterAuthentification::login($u['username'],$u['password']);
                Router::executeRoute('following');
            }catch(e){
                Router::executeRoute('login');
            }
        }
    }
}