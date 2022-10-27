<?php

namespace iutnc\tweeterapp\view;
use \iutnc\tweeterapp\view\TweetreView;
use \iutnc\mf\view\Renderer;


class LoginView extends TweeterView implements Renderer{
    function render():string{
        $res=<<<EOT
            <article class="theme-backcolor2">
                <form method=post>
                    <input class="forms-text" type=text name=username placeholder="username">
                    <input class="forms-text" type=text name=password placeholder="password">

                    <button class="forms-button name=login_button type=submit">Login</button>
                </form>
            </article>
            EOT;
        return $res;
    }
}