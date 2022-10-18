<?php

namespace iutnc\tweeterapp\control;

use \iutnc\mf\control\AbstractController;
use \iutnc\tweeterapp\model\Tweet;
use \iutnc\mf\router\Router;
class TweetController extends AbstractController{
    public function execute():void{
        $id= $this->request->get['id'];
        $t=Tweet::select()->where('id','=',$id)->first();
        $text=$t['text'];
        $author=$t->author()->first()['username'];
        $date=$t['created_at'];
        $score=$t['score'];
        $r=new Router();
        $url=$r->urlFor('home');
        $url1=$r->urlFor('user');
        $url1.="&id=1";
        $res="
            <div>
                <span>$text</span><br>
                <span style=\"font-weight:bold;\">$author</span><br>
                <span>$date</span><br>
                <span>$score</span><br>
                <span><a href=\"$url\">Tweets</a></span>
                <span><a href=\"$url1\">Tweet</a></span>
            </di>";
            echo $res;
    }
}