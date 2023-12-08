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
$routes->get('/(:num)', 'Home::detailBuku/$1');

$routes->get('/halamanCreate', 'Home::halamanCreate');
$routes->post('/create', 'Home::createBookAction');

$routes->get('/updateBook/(:num)', 'Home::updateBook/$1');
$routes->post('/updateBook/update/(:num)', 'Home::updateBookAction/$1');

$routes->get('/delete/(:num)', 'Home::deleteBook/$1');

