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



