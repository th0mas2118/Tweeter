<?php

namespace iutnc\tweeterapp\view;
use \iutnc\mf\view\AbstractView;
use \iuntc\mf\router\Router;
use \iutnc\mf\view\Renderer;

class PostView extends TweeterView implements Renderer{
    function render():string{
        $res='<article class=\"theme-backcolor2\">  
            <form class=\"forms\" method=post>
                <textarea class="forms-text" name="tweet" id="tweet" ></textarea>
        
                <button class="forms-button" name=login_button type="submit">Create</button>
            </form> </article> ';
        return $res;
    }
}