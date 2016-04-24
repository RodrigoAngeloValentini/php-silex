<?php
require_once __DIR__.'/../vendor/autoload.php';

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

$app = new Silex\Application();
$app['debug'] = true;

//$app->get('/artigos/{id}',function($id){
//    return new Response("Ola mundo:{$id}",200);
//})->convert('id',function($id){
//    return (int) $id;
//});

$app->get('/{nome}',function($nome){
    return new Response("Ola mundo:{$nome}",200);
})->value('nome','Rodrigo');
$app->run();