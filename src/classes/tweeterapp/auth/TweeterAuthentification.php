<?php

namespace iutnc\tweetrapp\auth;
use \iutnc\mf\auth\AbstractAuthentification;
use \iutnc\tweeterapp\model\User;

class TweeterAuthentification extends AbstractAuthentification{
    /*constante niveau d'accès utilisateur*/
    const ACCES_LEVEL_USER = 0;
    /* constant niveau d'accès administrateur */
    const ACCES_LEVEL_ADMIN = 1000;

    protected static function register(string $username, string $password, string $fullname, $level=self::ACCES_LEVEL_USER):void{
        if((User::find($username))){
            throw new E('Username already taken');
        }
        else{
            $user=new User();
            $uset->fullname=$fullname;
            $uset->username=$username;
            $uset->password=self::makePassword($password);
            $uset->level=$level;
        }
    }

    protected static function login(stirng $username, string $password):void{
        $user=User::find($username);
        if(!isset($user)){
            throw new E('No user found');
        }
        else{
            self::checkPassword($password,$user->password,$user->id,$user->level);
        }
    }
}