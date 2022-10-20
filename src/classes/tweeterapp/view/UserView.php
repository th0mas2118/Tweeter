<?php

namespace iutnc\tweeterapp\view;
use \iutnc\tweeterapp\view\TweetreView;
use \iutnc\mf\view\Renderer;

class UserView extends TweeterView implements Renderer{
    function render():string{
        $user="
            <div>
                <span>{$this->data['fullname']}</span>
                <span>{$this->data['username']}</span>
                <span>{$this->data['followers']}</span>
            </div>";
        $res=$user;
        $res.="<ul>";
        $tl = $this->data->tweets()->get();
        foreach($tl as $t){
            $url_tweet=$this->router->urlFor('view',[['id',$t['id']]]);
            $res.="<li><a href=\"$url_tweet\">${t['text']}</a></li>";
        }
        $res.="</ul>";
        return $res;
    }
}