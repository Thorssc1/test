<?php

use Symfony\Component\Routing\Route;
use Symfony\Component\Routing\RouteCollection;

// Routes system
$routes = new RouteCollection();
$routes->add('product',
    new Route(
        constant('URL_SUBFOLDER') . '/product/{id}',
        array(
            'controller' => 'ProductController',
            'method'=>'showAction'
        ),
        array(
            'id' => '[0-9]+'
        )
    )
);
$routes->add('app_home',
    new Route(
        constant('URL_SUBFOLDER') . '/',
        array(
            'controller' => 'ProductController',
            'method'=>'testAction'
        )
    )
);
$routes->add('app_home2',
    new Route(
        constant('URL_SUBFOLDER') . '/test',
        array(
            'controller' => 'ProductController',
            'method'=>'test2Action'
        )
    )
);
