<?php

namespace iutnc\tweeterapp\control;

use \iutnc\mf\control\AbstractController;
use \iutnc\mf\router\Router;
use \iutnc\mf\auth\AbstractAuthentification;

class LogoutController extends AbstractController{
    public function execute():void{
        AbstractAuthentification::logout();
        Router::executeRoute('home');
    }
}