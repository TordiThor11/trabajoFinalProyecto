<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

#En el routeo el primer parametro es el origen y el segundo el destino
#El destino creo se especifica como 'controlador a usar'::'metodo a llamar dentro del controlador'

$routes->get('/', 'Home::index');

$routes->get('/usuarios', 'UsersController::list');

$routes->get('/crear_proyecto', 'ProyectosController::index', ['filter' => 'autenticacion']);

$routes->post('/proyectos/save', 'ProyectosController::save');
#$routes->get('proyectos/save', 'ProyectosController::save'); #solo de prueba, se tiene que borrar


$routes->get('/detalleProyecto/(:num)', 'ProyectosController::mostrarDetalle/$1');



$routes->get('login', 'LoginController::index');

$routes->post('login', 'LoginController::login', ['filter' => 'isAdmin']);
$routes->get('logout', 'LoginController::logout');

$routes->get('registrar', 'RegistrarController::index');
$routes->post('registrar/guardar', 'RegistrarController::guardar');

$routes->get('misProyectos', 'ProyectosController::misProyectos', ['filter' => 'autenticacion']);
$routes->get('misPatrocinios', 'ProyectosController::misPatrocinios', ['filter' => 'autenticacion']);

#$routes->get('proyectos/patrocinar', 'ProyectosController::patrocinar'); #Uno de los dos deberia de ser borrado
$routes->post('proyectos/patrocinar/(:num)', 'ProyectosController::patrocinar/$1'); #Uno de los dos deberia de ser borrado

$routes->get('proyectos/ventanaDePago/(:num)', 'ProyectosController::ventanaDePago/$1', ['filter' => 'autenticacion']);
