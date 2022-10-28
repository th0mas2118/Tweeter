<?php

namespace iutnc\tweeterapp\view;
use \iutnc\tweeterapp\view\TweetreView;
use \iutnc\mf\view\Renderer;

class HomeView extends TweeterView implements Renderer{
    function render():string{
        $res=<<<EOT
            <article>
                <h2>Latest tweets</h2>
            EOT;
        foreach($this->data as $t){
            $url_user=$this->router->urlFor('user',[['id',$t->author()->first()['id']]]);
            $url_tweet=$this->router->urlFor('view',[['id',$t['id']]]);
            $res.=<<<EOT
                <div class="tweet">
                    <a href="$url_tweet">
                        <div class="tweet-text">{$t['text']}</div>
                    </a>
                    <div class="tweet-footer">
                        <span class="tweet-timestamp">{$t['created_at']}</span>
                        <span class="tweet-author"><a href="{$url_user}">{$t->author()->first()['username']}</a></span>
                    </div>
                </div>
                EOT;
        }
        $res.="</article>";
        return $res;
    }
}