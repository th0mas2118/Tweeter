<?php

namespace iutnc\tweeterapp\view;
use iutnc\tweeterapp\view\TweeterView;
use \iutnc\mf\view\Renderer;

class LoginView extends TweeterView implements Renderer{
    public function render():string{
        $res=<<<EOT
            <article class="theme-backcolor2">
                <form method=post>
                    <input class="forms-text" type=text name=username placeholder="username">
                    <input class="forms-text" type=password name=password placeholder="password">
                    <button class="forms-button name=login_button type=submit">Login</button>
                </form>
            </article>
            EOT;
        return $res;
    }
}