<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

$routes->resource('category', ['controller' => 'Category', 'only' => ['index', 'show', 'create', 'update', 'delete']]);
$routes->resource('user', ['controller' => 'User']);//, 'only' => ['index', 'show', 'create', 'update', 'delete']]);

$routes->get('/', 'App::index');
$routes->get('/home', 'App::home');
$routes->get('/categories', 'App::addcat');
$routes->get('/categories/add', 'App::addcat');
$routes->get('/categories/edit', 'App::editcat');

$routes->post('/user/login', 'User::login');
$routes->post('/category/create', 'Category::create');
$routes->post('/category/(:num)', 'Category::update/$1');
$routes->delete('/category/(:num)', 'Category::delete/$1');