<?php

namespace iutnc\tweeterapp\view;
use \iutnc\tweeterapp\view\TweetreView;
use \iutnc\mf\view\Renderer;
use \iutnc\mf\router\Router;

class UserView extends TweeterView implements Renderer{
    function render():string{
        $r=new Router();
        $user=$this->data;
        $t=$this->data->tweets()->first();
        $user_url=$r->urlFor('user',[['id',$t->author()->first()['id']]]);
        $nb_follow=$user['followers'];
        $res=<<<EOT
            <article class="theme-backcolor2">
                <h2>Tweet from {$user['username']}</h2>
                <h3>{$nb_follow} followers</h3>
            EOT;
        $tl = $this->data->tweets()->get();
        foreach($tl as $t){
            $url_tweet=$this->router->urlFor('view',[['id',$t['id']]]);
            $res.=<<<EOT
                <div class="tweet">   
                    <a href="$url_tweet">
                        <div class=tweet-text>{$t['text']}</div>
                    </a>
                    <div class="tweet-footer">
                        <span class="tweet-timestamp">{$t['created_at']}</span>
                        <span class="tweet-author"><a href="{$user_url}">{$user['username']}</a></span>
                    </div>
                </div>
                EOT;
        }
        $res.="</article>";
        return $res;
    }
}
