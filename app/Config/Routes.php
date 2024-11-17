<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
// $routes->get('/', 'Home::index');
$routes->get('/', 'Admin::login');
$routes->get('/login', 'Admin::login');
$routes->post('/authenticate', 'Admin::authenticate');
// $routes->get('/login', 'AuthController::login');
$routes->get('/logout', 'Admin::logout');
$routes->get('/dashboard', 'Admin::dashboard');
$routes->match(['get', 'post'], '/add-service', 'Admin::addService');
$routes->get('/view-services', 'Admin::viewServices');
$routes->post('/renew-service/(:num)', 'Admin::renewService/$1');
$routes->post('/delete-service/(:num)', 'Admin::deleteService/$1');
$routes->post('/mark-read/(:num)', 'Admin::markNotificationRead/$1');

