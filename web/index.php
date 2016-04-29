<?php
require_once __DIR__.'/../vendor/autoload.php';

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

$app = new Silex\Application();
$app['debug'] = true;

$app->register(new Silex\Provider\TwigServiceProvider(), array(
   'twig.path' => __DIR__.'/../views',
));

$app->register(new Silex\Provider\UrlGeneratorServiceProvider());

$app->get('/ola/{nome}',function($nome) use ($app){
    return $app['twig']->render('ola.twig',array('nome'=>$nome));
})->bind('ola');

$app->get('/link/{nome}',function($nome) use ($app){
    return $app['twig']->render('link.twig',array('nome'=>$nome));
})->bind('link');


$app->run();