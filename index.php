<?php
require_once "vendor/autoload.php";

use \iutnc\tweeterapp\model\User;
use \iutnc\tweeterapp\model\Follow;
use \iutnc\tweeterapp\model\Tweet;
use \iutnc\tweeterapp\model\Like;
use \iutnc\mf\view\AbstractView;
use \iutnc\tweeterapp\auth\TweeterAuthentification;
use \iutnc\mf\auth\AbstractAuthentification;

$config=parse_ini_file("./conf/config.ini");

$db= new Illuminate\Database\Capsule\Manager();
$db->addConnection($config);
$db->setAsGlobal();
$db->bootEloquent();
session_start();


/*
$t = new Tweet();
$t->text='ce tweet va tuer';
$t->author=11;
$t->score=0;
$t->save();
*/

/*<-------Test des différentes méthode première partie Modèle------->
$u=new User();
$u->fullname='toto';
$u->username='toto';
$u->password='foo';
$u->level=1;
$u->followers=0;
$u->save();

$t=Tweet::select()->where('id','=','49')->first();
echo $t;
echo '<br>';
$auteur = $t->author()->first();
echo $auteur;

$a=User::select()->where('id','=','1')->first();
$list_tweet=$a->tweets()->select('id')->get();
echo $list_tweet;

$t=Tweet::select()->where('id','=','63')->first();
$list_likes=$t->likedBy()->get();
echo $list_likes;

$a=User::select()->where('id','=','10')->first();
$list_tweet=$a->liked()->get();
echo $list_tweet;

$a=User::select()->where('id','=','9')->first();
$list_follow=$a->followedBy()->get();
echo $list_follow;
echo "<br>";

$b=User::select()->where('id','=','10')->first();
$list_followed=$b->follows()->get();
echo $list_followed;
<-------Test des différentes méthode première partie Modèle------->*/

/*<------Test des différent controle-------------------------------->
$ctrl = new \iutnc\tweeterapp\control\HomeController();
$ctrl->execute();

$ctrl1 = new \iutnc\tweeterapp\control\TweetController();
$ctrl1->execute();

$ctrl2 = new \iutnc\tweeterapp\control\UserController();
$ctrl2->execute();
<------Test des différent controle-------------------------------->*/
AbstractView::addStyleSheet('src/css/style.css');
AbstractView::setAppTitle('Mini TweeTR');
//AbstractView::addStyleSheet('src/css/all.min.css');
$router = new \iutnc\mf\router\Router();

$router->addRoute('home', 'list_tweets',      '\iutnc\tweeterapp\control\HomeController',AbstractAuthentification::ACCESS_LEVEL_NONE);
$router->addRoute('view', 'view_tweet',       '\iutnc\tweeterapp\control\TweetController',AbstractAuthentification::ACCESS_LEVEL_NONE);
$router->addRoute('user', 'view_user_tweets', '\iutnc\tweeterapp\control\UserController',AbstractAuthentification::ACCESS_LEVEL_NONE);
$router->addRoute('post', 'post_tweet', '\iutnc\tweeterapp\control\PostController',TweeterAuthentification::ACCES_LEVEL_USER);
$router->addRoute('signeup', 'signeup', '\iutnc\tweeterapp\control\SignupController',AbstractAuthentification::ACCESS_LEVEL_NONE);
$router->addRoute('login', 'login', '\iutnc\tweeterapp\control\LoginController',AbstractAuthentification::ACCESS_LEVEL_NONE);
$router->addRoute('logout', 'logout', '\iutnc\tweeterapp\control\LogoutController',TweeterAuthentification::ACCES_LEVEL_USER);
$router->addRoute('following', 'view_follwing', '\iutnc\tweeterapp\control\FollowingController',TweeterAuthentification::ACCES_LEVEL_USER);
$router->addRoute('like','like_tweet','\iutnc\tweeterapp\control\LikeController',TweeterAuthentification::ACCES_LEVEL_USER);
$router->addRoute('dislike','dislike_tweet','\iutnc\tweeterapp\control\LikeController',TweeterAuthentification::ACCES_LEVEL_USER);
$router->addRoute('follow','follow_user','\iutnc\tweeterapp\control\FollowController',TweeterAuthentification::ACCES_LEVEL_USER);


$router->setDefaultRoute('list_tweets');

$router->run();