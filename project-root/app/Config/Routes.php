
<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Page::index');

$routes->get('/books/index', 'Books::index');

$routes->get('/books/create', 'Books::create');

$routes->get('/books/edit/(:segment)', 'Books::edit/$1');

$routes->delete('/books/(:num)', 'Books::delete/$1');

$routes->post('save', 'Books::save');

//$routes->get('/', 'Page::contact');

$routes->get('/books/(:any)', 'Books::detail/$1');

//$routes->setAutoRoute(true);
