<?php

namespace iutnc\tweeterapp\view;
use \iutnc\mf\view\AbstractView;
use \iuntc\mf\router\Router;
use \iutnc\mf\view\Renderer;

class PostView extends TweeterView implements Renderer{
    function render():string{
        $res='<article class="theme-backcolor2">  
            <form method=post>
            <textarea id="tweet-form" name=tweet placeholder="Enter your tweet...", maxlength=140></textarea>
            <div><input id="send_button" type=submit name=send value="Send"></div>
            </form> </article> ';
        return $res;
    }
}