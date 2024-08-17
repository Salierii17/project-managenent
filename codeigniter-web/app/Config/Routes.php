<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

$routes->get('/', 'Home::index');

// Routes for Lokasi
$routes->get('home/addLokasi', 'Home::addLokasi');  // Show add lokasi form
$routes->post('home/addLokasi', 'Home::addLokasi'); // Handle lokasi addition
$routes->get('home/editLokasi/(:num)', 'Home::editLokasi/$1'); // Show edit lokasi form
$routes->get('home/editLokasi/(:num)', 'Home::editLokasi/$1'); // Show edit lokasi form
$routes->post('home/editLokasi/(:num)', 'Home::editLokasi/$1'); // Handle lokasi update
$routes->get('home/deleteLokasi/(:num)', 'Home::deleteLokasi/$1'); // Handle lokasi deletion

// Routes for Proyek
$routes->get('home/addProyek', 'Home::addProyek');  // Show add proyek form
$routes->post('home/addProyek', 'Home::addProyek'); // Handle proyek addition
$routes->get('home/editProyek/(:num)', 'Home::editProyek/$1'); // Show edit proyek form
$routes->post('home/editProyek/(:num)', 'Home::editProyek/$1'); // Handle proyek update
$routes->get('home/deleteProyek/(:num)', 'Home::deleteProyek/$1'); // Handle proyek deletion
