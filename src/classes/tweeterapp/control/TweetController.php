<?php

namespace iutnc\tweeterapp\control;

use \iutnc\mf\control\AbstractController;
use \iutnc\tweeterapp\model\Tweet;
class TweetController extends AbstractController{
    public function execute():void{
        $id= $this->request->get['id'];
        $t=Tweet::select()->where('id','=',$id)->first();
        $text=$t['text'];
        $author=$t->author()->first()['username'];
        $date=$t['created_at'];
        $score=$t['score'];
        $res="
            <div>
                <span>$text</span><br>
                <span style=\"font-weight:bold;\">$author</span><br>
                <span>$date</span><br>
                <spon>$score</span><br>
            </di>";
            echo $res;
    }
}