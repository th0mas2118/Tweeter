<?php

namespace iutnc\tweeterapp\control;

use \iutnc\tweeterapp\model\Tweet;
use \iutnc\tweeterapp\model\User;
use \iutnc\mf\control\AbstractController;

class UserController extends AbstractController{
    public function execute():void{
        $id= $this->request->get['id'];
        $tl=Tweet::select()->where('author','=',$id)->get();
        $u=User::select()->where('id','=',$id)->first();
        $u_name=$u['fullname'];
        $u_login=$u['username'];
        $u_follow=$u['followers'];
        $user="
            <div>
                <span>$u_name</span>
                <span>$u_login</span>
                <span>$u_follow</span>
            </div>";
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
        echo $user;
        echo $res;

    }
}