<?php


$controllerInitializer = new Framework\Initializer\Controller($app);
$controllerInitializer->initialize($app['config']['routes']);
