<?php

namespace iutnc\tweeterapp\view;
use \iutnc\tweeterapp\view\TweetreView;
use \iutnc\mf\view\Renderer;

class HomeView extends TweeterView implements Renderer{
    function render():string{
        $res="<ul>";
        foreach($this->data as $t){
            $url_user=$this->router->urlFor('user',[['id',$t->author()->first()['id']]]);
            $res.="<li>{$t['text']} <span style=\"font-weight:bold;\"><a href=\"$url_user\">{$t->author()->first()['username']}</span></a> {$t['created_at']}</li>";
        }
        $res.="</ul>";
        return $res;
    }
}