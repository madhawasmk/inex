<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

$routes->resource('user', ['controller' => 'User']);//, 'only' => ['index', 'show', 'create', 'update', 'delete']]);

$routes->get('/', 'App::index');
$routes->get('/home', 'App::home');

$routes->post('/user/login', 'User::login');