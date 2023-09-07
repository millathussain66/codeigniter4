<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

//  Total crud
// $routes->get('/', 'Home::index');
// $routes->post('/store', 'Home::store');
// $routes->get('delete/(:num)', 'Home::delete/$1');
// $routes->get('edit/(:num)', 'Home::edit/$1');
// $routes->post('/update', 'Home::update');


// for Login 

$routes->get('/', 'Users_info::index');
$routes->post('/loginAuth', 'Users_info::loginAuth');
$routes->get('/profile', 'Users_info::profile', ['filter' => 'auth']);
$routes->get('/logout', 'Users_info::logout');




$routes->get('/dashboard', 'Dashboard::view');
