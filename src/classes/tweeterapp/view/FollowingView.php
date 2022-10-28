<?php

namespace iutnc\tweeterapp\view;
use iutnc\tweeterapp\view\TweeterView;
use \iutnc\mf\view\Renderer;
use \iutnc\mf\auth\AbstractAuthentification;

class FollowingView extends TweeterView implements Renderer{
    public function render():string{
    $res="<article>";
    $res.="<h2>Currently following</h2>";
    $res.="<ul id=\"followees\">";
    foreach($this->data as $t){
        $url_user=$this->router->urlFor('user',[['id',$t['id']]]);
        $res.="<li class=\"user\"><a href=\"{$url_user}\">{$t['fullname']}</a>";
        if(AbstractAuthentification::connectedUser()){
            $url_unfollow=$this->router->urlFor('unfollow',[['id',$t['id']]]);
            $res.=<<<EOT
                <div class="button theme-backcolor2">
                    <a href="$url_unfollow">Unfollow</a>
                </div>
                EOT;
        }
    }
    $res.="</li></ul></article>";
    return $res;
    }
}