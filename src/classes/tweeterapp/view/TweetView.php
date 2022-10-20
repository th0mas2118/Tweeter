<?php

namespace iutnc\tweeterapp\view;
use \iutnc\tweeterapp\view\TweetreView;
use \iutnc\mf\view\Renderer;

class TweetView extends TweeterView implements Renderer{
    function render():string{
        $url=$this->router->urlFor('user',[['id',$this->data->author()->first()['id']]]);
        $res= "<div class=\"tweet\">
                    <span class=\"tweet-text\" >{$this->data['text']}</span><br>
                    <span class=\"tweet-author\" style=\"font-weight:bold;\"><a href=\"$url\">{$this->data->author()->first()['username']}</a></span><br>
                    <span>{$this->data['created_at']}</span><br>
                    <span>{$this->data['score']}</span><br>
                </di>";
        return $res;
    }
}