<?php
use Symfony\Component\HttpFoundation\Response;

$enquete = $app['controllers_factory'];

$enquete->get("/",function(){
    return new Response('Acesso à enquete');
});

$enquete->get("/show",function(){
    return new Response('Exibir um enquete');
});

return $enquete;