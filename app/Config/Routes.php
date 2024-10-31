<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

#En el routeo el primer parametro es el origen y el segundo el destino
#El destino creo se especifica como 'controlador a usar'::'metodo a llamar dentro del controlador'

$routes->get('/', 'Home::index');

$routes->get('/usuarios', 'UsersController::list');

$routes->get('/crear_proyecto', 'ProyectosController::index');
$routes->post('/proyectos/save', 'ProyectosController::save');
