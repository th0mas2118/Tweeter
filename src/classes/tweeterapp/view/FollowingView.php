<?php

namespace iutnc\tweeterapp\view;
use iutnc\tweeterapp\view\TweeterView;
use \iutnc\mf\view\Renderer;

class FollowingView extends TweeterView implements Renderer{
    public function render():string{
    $res="<article>";
    $res.="<h2>Currently following</h2>";
    $res.="<ul id=\"followees\">";
    foreach($this->data as $t){
        $url_user=$this->router->urlFor('user',[['id',$t->author()->first()['id']]]);
        $res.="<li class=\"user\"><a href=\"{$url_user}\">{$t->author()->first()['fullname']}</a</li>";
    }
    $res.="</ul></article>";
    return $res;
    }
}