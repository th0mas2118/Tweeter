<?php

namespace iutnc\tweeterapp\control;

use \iutnc\mf\control\AbstractController;
use \iutnc\mf\router\Router;
use \iutnc\tweeterapp\auth\TweeterAuthentification;
use \iutnc\tweeterapp\view\SignupView;

class SignupController extends AbstractController{
    public function execute():void{
        if($this->request->method==='GET'){
            $sv=new SignupView();
            $sv->makePage();
        }
        if($this->request->method==='POST'){
            $u=$this->request->post;
            try{
                TweeterAuthentification::register($u['username'],$u['password'],$u['fullname']);
            }catch(e){
                echo 'username too used';
                Router::executeRoute('signeup');
            }
        }
    }
}