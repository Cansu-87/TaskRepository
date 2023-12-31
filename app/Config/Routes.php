<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->setAutoRoute(true);
$routes->get("/Home","DatatableController::showdata");

$routes->post("/Task/addTask","Task::addTask");
$routes->post("/DatatableController/addTaskData","DatatableController::addTaskData");
$routes->get("/","Task::show");
$routes->post("/Task/update","Task::update");


$routes->post("/Task/delete","Task::delete");

//$routes->get('Task/delete/(:num)', 'Task::delete/$1');
//$routes->get("/","Task::update");

