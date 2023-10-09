<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

//$routes->get("/Task","Task::index");
$routes->post("/Task/addTask","Task::addTask");
$routes->get("/","Task::show");
$routes->post("/Task/update","Task::update");
//$routes->get("/","Task::update");

