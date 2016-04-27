<?php
require_once __DIR__.'/../vendor/autoload.php';

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

$app = new Silex\Application();
$app['debug'] = true;

$app->mount("/enquete",include 'enquete.php');
$app->mount("/forum",include 'forum.php');

$app->run();