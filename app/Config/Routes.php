<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

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
$routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// Home Page
$routes->get('/', 'Home::index');

// Kontak Page
$routes->get('/kontak', 'Kontak::index');

// Authentication Routes
$routes->get('/login', 'Auth::login');
$routes->post('/auth', 'Auth::auth');
$routes->get('/logout', 'Auth::logout');

// Customer Routes
$routes->post('/customer/search', 'Customer::search');
$routes->post('/customer/buy', 'Customer::buy');

// Order Routes
$routes->get('/order/checkout/(:num)', 'Order::index/$1');
$routes->post('/order/processOrder', 'Order::processOrder');

$routes->get('product/detail/(:num)', 'Admin\Product::detail/$1');

$routes->get('/search', 'Home::search');



// Admin Routes
$routes->group('admin', ['namespace' => 'App\Controllers\Admin'], function ($routes) {
    // Dashboard
    $routes->get('dashboard', 'Dashboard::index');

    // Product CRUD
    $routes->get('products', 'Product::index');
    $routes->get('products/create', 'Product::create');
    $routes->post('products/store', 'Product::store');
    $routes->get('products/edit/(:num)', 'Product::edit/$1');
    $routes->post('products/update/(:num)', 'Product::update/$1');
    $routes->get('products/delete/(:num)', 'Product::delete/$1');
});
   // Route Profil
   $routes->group('profile', function ($routes) {
    $routes->get('/', 'Admin\Profile::index'); // Melihat profil
    $routes->post('update', 'Admin\Profile::update'); // Mengupdate profil
});

/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * Environment-based routing is one such example. If you'd like to
 * require additional route files, you can do so here. You will have
 * access to the $routes object within that file without needing to
 * reload it.
 */
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
