<?php

namespace iutnc\tweeterapp\control;

use \iutnc\tweeterapp\model\Tweet;
use \iutnc\tweeterapp\model\User;
use \iutnc\mf\control\AbstractController;
use \iutnc\mf\router\Router;
use \iutnc\tweeterapp\view\UserView;

class UserController extends AbstractController{
    public function execute():void{
        $id= $this->request->get['id'];
        $u=User::select()->where('id','=',$id)->first();
        $tl=$u->tweets()->get();
        $uv=new UserView($u);
        $uv->makePage();
        //Ancienne version avant vue
        // $u_name=$u['fullname'];
        // $u_login=$u['username'];
        // $u_follow=$u['followers'];
        // $user="
        //     <div>
        //         <span>$u_name</span>
        //         <span>$u_login</span>
        //         <span>$u_follow</span>
        //     </div>";
        // $res='';
        // foreach($tl as $t){
        //     $text=$t['text'];
        //     $author=$t->author()->first()['username'];
        //     $date=$t['created_at'];
        //     $r=new Router();
        //     $url_tweet=$r->urlFor('view',[['id',$t['id']]]);
        //     $res.="
        //         <div>
        //             <span><a href=\"$url_tweet\">$text</a></span>
        //             <span style=\"font-weight:bold;\">$author</span>
        //             <span>$date</span>
        //             <br><br>
        //         </di>";
        // }
        // echo $user;
        // echo $res;

    }
}