<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */


//! General area
// Nav content
$routes->get('/', 'Home::index');
$routes->get('/product', 'Home::product');
$routes->get('/about', 'Home::about');

// PDF reader
$routes->post('/read', 'Home::pdfReader');

//membership
$routes->get('/membership', 'Membership::index');
$routes->post('/belimembership', 'Membership::beliMembership');

$routes->get('/transaksi', 'Membership::userTransaction');



//! Admin area

    // CRUD
    $routes->get('/crud', 'Home::crud', ['filter' => 'role:admin']);

    $routes->get('detail/(:num)', 'Home::detailBuku/$1', ['filter' => 'role:admin']);

    $routes->get('/halamanCreate', 'Home::halamanCreate', ['filter' => 'role:admin']);
    $routes->post('/create', 'Crud::createBookAction', ['filter' => 'role:admin']);

    $routes->get('updateBook/(:num)', 'Crud::updateBook/$1', ['filter' => 'role:admin']);
    $routes->post('/updateBook/update/(:num)', 'Crud::updateBookAction/$1', ['filter' => 'role:admin']);

    $routes->get('/delete/(:num)', 'Crud::deleteBook/$1', ['filter' => 'role:admin']);

    $routes->get('/alltransaction', 'Membership::showTransaction', ['filter' => 'role:admin']);
    
    $routes->post('/confirmmembership', 'Membership::manageTransaction', ['filter' => 'role:admin']);



