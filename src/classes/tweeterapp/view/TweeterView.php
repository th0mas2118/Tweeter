<?php

namespace iutnc\tweeterapp\view;
use \iutnc\mf\view\AbstractView;
use \iutnc\mf\router\Router;
use \iutnc\mf\auth\AbstractAuthentification;
use \iutnc\mf\exceptions\AuthentificationException as E;

abstract class TweeterView extends AbstractView{
    function makeBody():string{
        $list=$this->render();
        $body="
            <header>
                {$this->renderTopMenu()}
            </header>
            <section>
                {$list}
                {$this->renderBottomMenu()}
            </section>
            <footer>
                <span>La super app créée en licence Pro @2022</span>
            </footer>
            ";
            return $body;
    }
    function renderBottomMenu():string{
        if(AbstractAuthentification::connectedUser()){
            $r=new Router();
            $url=$r->urlFor('post');
            $res=<<<EOT
            <nav id="menu" class="theme-backcolor1">
                <div id="nav-menu">
                    <div class="button theme-backcolor2">
                        <a href="{$url}">New</a>
                    </div>
                </div>
            </nav>
            EOT;
            return $res;
        }
        else{
            return "";
        }
    }
    function renderTopMenu():string{
        $url=$this->router->urlFor('home');
        if(AbstractAuthentification::connectedUser()){
            $url_following=$this->router->urlFor('following');
            $url_logout=$this->router->urlFor('logout');
            $res="
            <h1>MiniTweeTR</h1>
                <nav id=\"navbar\"><a class=\"tweet-controls\" href=\"$url\"><i class=\"fa-solid fa-house\"></i></a><a href=\"$url_following\" class=\"tweet-controls\" ><i class=\"fa-solid fa-user\"></i>
                </a><a href=\"$url_logout\" class=\"tweet-controls\" ><i class=\"fa-solid fa-arrow-right-from-bracket\"></i></a></nav>
            ";
            return $res;
        }
        else{
            $url_login=$this->router->urlFor('login');
            $url_signup=$this->router->urlFor('signeup');
            $res="
            <h1>MiniTweeTR</h1>
                <nav id=\"navbar\"><a class=\"tweet-controls\" href=\"$url\"><i class=\"fa-solid fa-house\"></i></a><a href=\"$url_login\" class=\"tweet-controls\" ><i class=\"fa-solid fa-arrow-right-to-bracket\"></i>
                </a><a href=\"$url_signup\" class=\"tweet-controls\" ><i class=\"fa-solid fa-plus\"></i></a></nav>
            ";
            return $res;
        }
    }
}