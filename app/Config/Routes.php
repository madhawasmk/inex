<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

$routes->resource('category', ['controller' => 'Category', 'only' => ['index', 'show', 'create', 'update', 'delete']]);
$routes->resource('transaction', ['controller' => 'Transaction', 'only' => ['index', 'show', 'create', 'update', 'delete']]);
$routes->resource('user', ['controller' => 'User']);//, 'only' => ['index', 'show', 'create', 'update', 'delete']]);
$routes->get('/report/income', 'Report::income');
$routes->get('/report/expense', 'Report::expense');

$routes->get('/', 'App::index');
$routes->get('/home', 'App::home');
$routes->get('/categories', 'App::addcat');
$routes->get('/categories/add', 'App::addcat');
$routes->get('/categories/edit', 'App::editcat');
$routes->get('/transactions', 'App::addtr');
$routes->get('/transactions/add', 'App::addtr');
$routes->get('/transactions/edit', 'App::edittr');
$routes->get('/reports/income', 'App::income_analyse');
$routes->get('/reports/expense', 'App::expense_analyse');

$routes->post('/user/login', 'User::login');

$routes->post('/category/create', 'Category::create');
$routes->post('/category/(:num)', 'Category::update/$1');
$routes->delete('/category/(:num)', 'Category::delete/$1');

$routes->post('/transaction/create', 'Transaction::create');
$routes->post('/transaction/(:num)', 'Transaction::update/$1');
$routes->delete('/transaction/(:num)', 'Transaction::delete/$1');