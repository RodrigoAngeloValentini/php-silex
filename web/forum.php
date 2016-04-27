<?php
use Symfony\Component\HttpFoundation\Response;

$forum = $app['controller_factory'];

$forum->get("/", function(){
    return new Response('Acesso ao forum');
});

return $forum;