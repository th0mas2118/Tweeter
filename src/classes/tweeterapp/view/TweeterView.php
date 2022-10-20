<?php

namespace iutnc\tweeterapp\view;
use \iutnc\mf\view\AbstractView;

abstract class TweeterView extends AbstractView{
    function makeBody():string{
        $list=$this->render();
        $body="
            <header>
                <div>MiniTweeTR</div>
                <nav><a>Home</a><a>Login</a><a>New</a></nav>
            </header>
            <section>
                ${list}
            </section>
            <footer>
                <span>La super app créée en licence Pro @2022</span>
            </footer>
            ";
            return $body;
    }
}