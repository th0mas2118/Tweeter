<?php

namespace iutnc\tweeterapp\view;
use iutnc\tweeterapp\view\TweeterView;
use \iutnc\mf\view\Renderer;

class SignupView extends TweeterView implements Renderer{
    public function render():string{
        $res=<<<EOT
            <article class="theme-backcolor2">
                <form method=post>
                    <input class="forms-text" type=text name=fullname placeholder="full name">
                    <input class="forms-text" type=text name=username placeholder="username">
                    <input class="forms-text" type=password name=password placeholder="password">
                    <input class="forms-text" type=password name=password-verify placeholder="retype password">

                    <button class="forms-button" name=sign_button type="submit">Create</button>
                </form>
            </article>
            EOT;
        return $res;
    }
}