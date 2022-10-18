<?php
require_once "vendor/autoload.php";

use \iutnc\tweeterapp\model\User;
use \iutnc\tweeterapp\model\Follow;
use \iutnc\tweeterapp\model\Tweet;
use \iutnc\tweeterapp\model\Like;

$config=parse_ini_file("./conf/config.ini");

$db= new Illuminate\Database\Capsule\Manager();
$db->addConnection($config);
$db->setAsGlobal();
$db->bootEloquent();


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
$router = new \iutnc\mf\router\Router();

$router->addRoute('home', 'list_tweets',      '\iutnc\tweeterapp\control\HomeController');
$router->addRoute('view', 'view_tweet',       '\iutnc\tweeterapp\control\TweetController');
$router->addRoute('user', 'view_user_tweets', '\iutnc\tweeterapp\control\UserController');

$router->setDefaultRoute('list_tweets');

// print_r(\iutnc\mf\router\Router::$routes);
// print_r(\iutnc\mf\router\Router::$aliases);

$router->run();