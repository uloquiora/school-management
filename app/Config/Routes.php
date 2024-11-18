<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

 $routes->get('/students', 'StudentController::index'); // Show student list
 $routes->get('/students/create', 'StudentController::create'); // Show create form
 $routes->post('/students/store', 'StudentController::store'); // Store student data 
$routes->get('/dashboard', 'Dashboard::index');
$routes->get('/students/edit/(:segment)', 'StudentController::edit/$1');
$routes->post('/students/update/(:segment)', 'StudentController::update/$1');


