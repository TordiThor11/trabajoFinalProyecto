<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use CodeIgniter\HTTP\CLIRequest;
use CodeIgniter\HTTP\IncomingRequest;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Psr\Log\LoggerInterface;

/**
 * Class BaseController
 *
 * BaseController provides a convenient place for loading components
 * and performing functions that are needed by all your controllers.
 * Extend this class in any new controllers:
 *     class Home extends BaseController
 *
 * For security be sure to declare any new methods as protected or private.
 */
abstract class BaseController extends Controller
{
    protected $db;
    protected $session;
    /**
     * Instance of the main Request object.
     *
     * @var CLIRequest|IncomingRequest
     */
    protected $request;

    /**
     * An array of helpers to be loaded automatically upon
     * class instantiation. These helpers will be available
     * to all other controllers that extend BaseController.
     *
     * @var list<string>
     */
    protected $helpers = [];

    /**
     * Be sure to declare properties for any property fetch you initialized.
     * The creation of dynamic property is deprecated in PHP 8.2.
     */
    // protected $session;

    /**
     * @return void
     */
    public function initController(RequestInterface $request, ResponseInterface $response, LoggerInterface $logger)
    {
        // Do Not Edit This Line
        parent::initController($request, $response, $logger);

        // Preload any models, libraries, etc, here.

        $this->session = \Config\Services::session();
        $this->db = db_connect();
    }

    public function layout($page, $data)
    {
        $notificacionModel = new \App\Models\NotificacionModel();
        $idUsuario = session()->get('id_usuario');
        $data['notificaciones_no_leidas'] = $notificacionModel->recuperarNotificacionesNoLeidas($idUsuario);
        // $data['notificaciones'] = $notificationModel->where('id_usuario', $idUsuario)->findAll();

        // Cargar las notificaciones del usuario

        $notificaciones = $notificacionModel->where('id_usuario', $idUsuario)->findAll();

        if (!empty($notificaciones)) {
            // Extraer los IDs de proyecto de las notificaciones
            $proyecto_ids = array_map(function ($notificacion) {
                return $notificacion->id_proyecto;
            }, $notificaciones);

            // Cargar los proyectos correspondientes a esos IDs
            $proyectoModel = new \App\Models\ProyectoModel();
            $proyectos = $proyectoModel->whereIn('id_proyecto', $proyecto_ids)->findAll();

            // Asociar detalles de los proyectos a las notificaciones
            $proyectos_map = [];
            foreach ($proyectos as $proyecto) {
                $proyectos_map[$proyecto->id_proyecto] = $proyecto;
            }

            foreach ($notificaciones as &$notificacion) {
                $notificacion->proyecto = $proyectos_map[$notificacion->id_proyecto] ?? null;
            }
        }
        $data['notificaciones'] = $notificaciones;

        return view('templates/header', $data) .
            view($page, $data) .
            view('templates/footer');
    }
}
