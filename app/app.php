<?php

    require_once __DIR__."/../vendor/autoload.php";

    $app = new Silex\Application();
    $app['debug'] = true;

    $DB = new PDO('pgsql:host=localhost;dbname=registrar');

    $app->register(new Silex\Provider\TwigServiceProvider(), array ('twig.path' => __DIR__."/../views"));

    use Symfony\Component\HttpFoundation\Request;
    Request::enableHttpMethodParameterOverride();

    $app->get("/", function() use ($app) {
        return $app['twig']->render('index.twig');
    });

    return $app;





?>
