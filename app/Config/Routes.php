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
$routes->get('proyectos/save', 'ProyectosController::save'); #solo de prueba, se tiene que borrar


$routes->get('/detalleProyecto/(:num)', 'ProyectosController::mostrarDetalle/$1');


$routes->get('login', 'LoginController::login');


$routes->post('login', 'LoginController::login');
$routes->get('logout', 'LoginController::logout');

$routes->get('registrar', 'RegistrarController::index');
$routes->post('registrar/guardar', 'RegistrarController::guardar');

$routes->get('misProyectos', 'ProyectosController::misProyectos');

