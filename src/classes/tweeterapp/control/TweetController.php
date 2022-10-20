<?php

namespace iutnc\tweeterapp\control;

use \iutnc\mf\control\AbstractController;
use \iutnc\tweeterapp\model\Tweet;
use \iutnc\mf\router\Router;
use \iutnc\tweeterapp\view\TweetView;

class TweetController extends AbstractController{
    public function execute():void{
        $id= $this->request->get['id'];
        $t=Tweet::select()->where('id','=',$id)->first();
        $tv=new TweetView($t);
        $tv->makePage();
        //Ancienne version avant vue
        // $text=$t['text'];
        // $author=$t->author()->first()['username'];
        // $date=$t['created_at'];
        // $score=$t['score'];
        // $r=new Router();
        // $url_user=$r->urlFor('user',[['id',$t->author()->first()['id']]]);
        // $res="
        //     <div>
        //         <span>$text</span><br>
        //         <span style=\"font-weight:bold;\"> <a href=\"$url_user\">$author</a> </span><br>
        //         <span>$date</span><br>
        //         <span>$score</span><br>
        //     </di>";
        // echo $res;
    }
}