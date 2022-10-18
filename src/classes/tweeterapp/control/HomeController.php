<?php

namespace iutnc\tweeterapp\control;

use \iutnc\tweeterapp\model\Tweet;
use \iutnc\mf\control\AbstractController;

class HomeController extends AbstractController{
    public function execute():void{
        $tl=Tweet::select()->get();
        $res='';
        foreach($tl as $t){
            $text=$t['text'];
            $author=$t->author()->first()['username'];
            $date=$t['created_at'];
            $res.="
                <div>
                    <span>$text</span>
                    <span style=\"font-weight:bold;\">$author</span>
                    <span>$date</span>
                    <br><br>
                </di>";
        }
        echo $res;
    }
}