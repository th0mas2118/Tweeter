<?php

namespace iutnc\tweeterapp\view;
use \iutnc\tweeterapp\view\TweetreView;
use \iutnc\mf\view\Renderer;
use \iutnc\mf\auth\AbstractAuthentification;

class TweetView extends TweeterView implements Renderer{
    function render():string{
        $url=$this->router->urlFor('user',[['id',$this->data->author()->first()['id']]]);
        $url_tweet=$this->router->urlFor('view',[['id',$this->data['id']]]);
        $res=<<<EOT
            <article class="theme-backcolor2">
                <div class="tweet">
                    <a href="{$url_tweet}">
                        <div class="tweet-text">{$this->data['text']}</div>
                    </a>
                    <div class="tweet-footer">
                        <span class="timestamp">{$this->data['created_at']}</span>
                        <span class="tweet-author">
                            <a href="$url">{$this->data->author()->first()['username']}</a>
                        </span>
                    </div>
                    <div class="tweet-footer">
                        <hr>
                        <span class="tweet-score tweet-conrol">{$this->data['score']}</span>
            EOT;
        if(AbstractAuthentification::connectedUser()){
            $res.=<<<EOT
                <a class="tweet-control" href="">
                    <img alt="like" src="src/img/like.png">
                </a>
                <a class="tweet-control" href="">
                    <img alt="dislike" src="src/img/dislike.png">
                </a>
                <a class="tweet-control" href="">
                    <img alt="follow" src="src/img/follow.png">
                </a>
                EOT;
        }
        $res.=<<<EOT
                    </div>
                </div>
            </article>
            EOT;
        return $res;
    }
}