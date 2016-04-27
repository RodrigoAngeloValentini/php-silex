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

$before = function(){
    echo "Executou antes do callback";
};

$after = function(Request $request, Response $response) use ($app){
    echo "Rodou depois do callback";
};

$app->get('/nome/{nome}',function($nome){
    return new Response("Ola mundo:{$nome}",200);
})
    ->value('nome','Rodrigo')
    ->bind('rota_rodrigo')
    ->before($before)
    ->after($after);

$app->get('/json',function() use($app){
    $array = array('nome'=>'rodrigo');
    $erro = array('message'=>'Ero ao processar');
    return $app->json($erro,404);
});

$app->before(function(Request $request){
    //echo "Rodou antes";
}, Silex\Application::EARLY_EVENT);

//Executado antes do response para o browser
$app->after(function(Request $request, Response $response){
    //echo "Rodou depois";
});

//Executado depois do response para o browser
$app->finish(function(Request $request, Response $response){
    //echo "Rodou depois";
});


$app->run();