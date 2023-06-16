<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();


/**
 * Filters Steup
 */

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
// $routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.


$routes->group('', ['filter' => 'AuthAlready'], function ($routes) {
    $routes->get('/', 'Home::index');
    $routes->get('/auth/register', 'Auth::register');
    $routes->get('/auth', 'Auth::index');
    $routes->post('/auth/registerUser', 'Auth::registerUser');
    $routes->post('/auth/loginUser', 'Auth::loginUser');
});

$routes->group('', ['filter' => 'AuthCheck'], function ($routes) {
    $routes->post('/auth/logout', 'Auth::logoutUser');

    $routes->get('/dashboard', 'Dashboard::index');

    $routes->get('/inventory', 'Item::index');
    $routes->get('/inventory/create', 'Item::create');
    $routes->post('/inventory/create', 'Item::createItem');
    $routes->get('/inventory/(:num)', 'Item::view/$1');
    $routes->get('/inventory/(:num)/update', 'Item::update/$1');
    $routes->post('/inventory/(:num)/update', 'Item::updateItem/$1');
    $routes->post('/inventory/(:num)/delete', 'Item::delete/$1');

    $routes->get('/customer', 'Customer::index');
    $routes->get('/customer/create', 'Customer::create');
    $routes->post('/customer/create', 'Customer::createCustomer');
    $routes->get('/customer/(:num)', 'Customer::view/$1');
    $routes->get('/customer/(:num)/update', 'Customer::update/$1');
    $routes->post('/customer/(:num)/update', 'Customer::updateCustomer/$1');
    $routes->post('/customer/(:num)/delete', 'Item::delete/$1');

    $routes->get('/transaction', 'Transaction::index');
    $routes->get('/transaction/create', 'Transaction::create');
    $routes->post('/transaction/create', 'Transaction::createTransaction');
    $routes->post('transaction/items/update', 'Transaction::updateCartItems');
    $routes->post('transaction/items/delete', 'Transaction::deleteAllCartItems');
    $routes->post('transaction/items/(:num)/delete', 'Transaction::deleteCartItem/$1');

    $routes->get('/transactions', 'Dashboard::transactions');
    $routes->get('/summary', 'Dashboard::summary');
    $routes->get('/preferences', 'Dashboard::preferences');
});
/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
