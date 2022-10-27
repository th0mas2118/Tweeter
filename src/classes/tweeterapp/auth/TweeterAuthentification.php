<?php

namespace iutnc\tweeterapp\auth;
use \iutnc\mf\auth\AbstractAuthentification;
use \iutnc\mf\exceptions\AuthentificationException as E;
use \iutnc\tweeterapp\model\User;

class TweeterAuthentification extends AbstractAuthentification{
    /*constante niveau d'accès utilisateur*/
    const ACCES_LEVEL_USER = 0;
    /* constant niveau d'accès administrateur */
    const ACCES_LEVEL_ADMIN = 1000;

    public static function register(string $username, string $password, string $fullname, $level=self::ACCES_LEVEL_USER):void{
        if((User::where('username','=',$username)->first())){
            throw new E('Username already taken');
        }
        else{
            $user=new User();
            $user->fullname=$fullname;
            $user->username=$username;
            $user->password=self::makePassword($password);
            $user->level=$level;
            $user->followers=0;
            $user->save();
        }
    }

    public static function login(string $username, string $password):void{
        $user=User::where('username','=',$username)->first();
        if(!isset($user)){
            throw new E('No user found');
        }
        else{
            self::checkPassword($password,$user["password"],$user['id'],$user->level);
        }
    }
}