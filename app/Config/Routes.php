<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

 //nav content
$routes->get('/', 'Home::index');
$routes->get('/product', 'Home::product');
$routes->get('/about', 'Home::about');

//order
$routes->get('/order/(:num)', 'Order::dataForForm/$1');
$routes->post('/save', 'Order::makeOrder');
$routes->get('/orderlist', 'Order::orderList');

//update
$routes->get('/updateproduct', 'Order::updateOrder');
$routes->post('/updateaction', 'Order::updateAction');
$routes->post('/deleteproduct', 'Order::deleteOrder');

//bukti transaksi

$routes->post('/uploadstruk', 'Order::uploadStruk');

//crud
$routes->get('/crud', 'Home::crud');
$routes->get('detail/(:num)', 'Home::detailBuku/$1');

$routes->get('/halamanCreate', 'Home::halamanCreate');
$routes->post('/create', 'Crud::createBookAction');

$routes->get('updateBook/(:num)', 'Crud::updateBook/$1');
$routes->post('/updateBook/update/(:num)', 'Crud::updateBookAction/$1');

$routes->get('/delete/(:num)', 'Crud::deleteBook/$1');

$routes->get('search', 'Crud::search');


//pdf reader
$routes->post('/read', 'Home::pdfReader');

//membership
$routes->get('/membership', 'Membership::index');
$routes->post('/belimembership', 'Membership::beliMembership');
$routes->get('/alltransaction', 'Membership::showTransaction');

