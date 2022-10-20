<?php

namespace iutnc\mf\router;

class Router extends AbstractRouter{
    public function addRoute(string $name,string $action,string $ctrl):void{
        self::$routes[$action]=$ctrl;
        self::$aliases[$name]=$action;
    }

    public function setDefaultroute(string $action):void{
        self::$aliases['default']=$action;
    }
    
    public function run():void{
        if(!isset($this->request->get['action']) || $this->request->get['action']==='' ){
            $ctrl = new \iutnc\tweeterapp\control\HomeController();<a href=\"$url_user\">
            $ctrl->execute();
        }
        else{
            $action=$this->request->get['action'];
            if(isset(self::$routes[$action])){
                $ctrl = new self::$routes[$action];
                $ctrl->execute();
            }
        }
    }
    public static function executeRoute(string $alias){
        $action=self::$aliases[$alias];
        $ctrl=new self::$routes[$action];
        $ctrl->execute();
    }
    public function urlFor(string $name,array $params=[]):string{
        $res=$_SERVER['SCRIPT_NAME'];
        $res.="?action=";
        $action=self::$aliases[$name];
        $res.=$action;
        foreach($params as $i){
            $res.='&id=';
            $res.=$i[1];
        }
        return $res;
    }
}