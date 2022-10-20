<?php

namespace iutnc\tweeterapp\view;
use \iutnc\mf\view\AbstractView;
use \iuntc\mf\router\Router;

abstract class TweeterView extends AbstractView{
    function makeBody():string{
        $url=$this->router->urlFor('home');
        $list=$this->render();
        $body="
            <header>
                <div>MiniTweeTR</div>
                <nav><a class=\"tweet-controls\" href=\"$url\"><i class=\"fa-solid fa-house\"></i></a><a><i class=\"fa-solid fa-arrow-right-to-bracket\"></i>

                </a><a><i class=\"fa-solid fa-plus\"></i></a></nav>
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