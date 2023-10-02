<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get("/Task","Task::index");
$routes->post("/Task/addTask","Task::addTask");
$routes->get("/show","Task::show");

