<?php

namespace iutnc\mf\router;

class Router extends AbstractRouter{
    public function addRoute(string $name,string $action,string $ctrl):void{
        self::$routes[$action]=$ctrl;
    }

    public function setDefaultroute(string $action):void{
        self::$aliases['default']=$action;
    }
    
    public function run():void{
        echo "here";
        if(!isset($this->request->get['action'])){
            $ctrl = new \iutnc\tweeterapp\control\HomeController();
            $ctrl->execute();
        }
    }
    public function urlFor(string $name,array $params=[]):string{
        return "";
    }
}