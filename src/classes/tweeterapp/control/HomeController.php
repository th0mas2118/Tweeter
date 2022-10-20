<?php

namespace iutnc\tweeterapp\control;

use \iutnc\tweeterapp\model\Tweet;
use \iutnc\mf\control\AbstractController;
use \iutnc\mf\router\Router;
use \iutnc\tweeterapp\view\HomeView;


class HomeController extends AbstractController{
    public function execute():void{
        $tl=Tweet::select()->get();
        $hv=new HomeView($tl);
        $hv->makePage();
        //Ancienne version avant vue
        // $res='';
        // foreach($tl as $t){
        //     $text=$t['text'];
        //     $author=$t->author()->first()['username'];
        //     $date=$t['created_at'];
        //     $r=new Router();
        //     $url_user=$r->urlFor('user',[['id',$t->author()->first()['id']]]);
        //     $res.="
        //         <div>
        //             <span>$text</span>
        //             <span style=\"font-weight:bold;\"><a href=\"$url_user\">$author</a></span>
        //             <span>$date</span>
        //             <br><br>
        //         </di>";
        // }
        // echo $res;
    }
}