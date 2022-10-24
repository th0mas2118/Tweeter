<?php

namespace iutnc\tweeterapp\control;
use \iutnc\mf\control\AbstractController;
use \iutnc\tweeterapp\view\PostView;
use \iutnc\tweeterapp\model\Tweet;
use \iuntc\mf\router\Router;

class PostController extends AbstractController{
    public function execute():void{
        if($this->request->method==='GET'){
            $pv=new PostView('toto');
            $pv->makePage();
        }
        if($this->request->method==='POST'){
            $text=$this->request->post;
            $tweet = new Tweet();
            if($text['tweet']===""){
                return;
            }
            $tweet->text=$text['tweet'];
            $tweet->author=1;
            $tweet->score=0;
            $tweet->save();
            $r=new \iutnc\mf\router\Router();
            $r->executeRoute('home');
        }
    }
}