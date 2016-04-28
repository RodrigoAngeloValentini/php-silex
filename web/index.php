<?php
require_once __DIR__.'/../vendor/autoload.php';

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

$app = new Silex\Application();
$app['debug'] = true;

//$app['res'] = function(){
//  return new Response('OI');
//};

$app['res'] = $app->share(function(){
    return new Response('OI');
});

$res1 = $app['res'];
$res2 = $app['res'];

if($res1 === $res2){
    echo "São iguais";
}else{
    echo "São diferentes";
}

//$app['pdo'] = function(){
//    return new PDO('dsn','usuario','senha');
//};
//$app['pessoa'] = function() use($app){
//    $pdo = $app['pdo'];
//    return new Pessoa($pdo);
//};
//$pessoa = $app['pessoa'];

$app->mount("/enquete",include 'enquete.php');
$app->mount("/forum",include 'forum.php');

$app->run();