<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\NotificacionModel;

class NotificacionesController extends BaseController
{
    public function index(): string
    {

        #esto valida si el usuario esta logueado, pero no deberia de estar aca.
        #Un usuario deberia poder acceder al home sin estar logueado.

        // $session = session();
        // if (!$session->get('isLoggedIn')) {
        //     return redirect()->to('/login');
        // }

        // Obtener datos del modelo de proyectos
        $model = new ProyectoModel();
        $data['proyectos'] = $model->findAll();

        return $this->layout('view_home.php', $data);
    }
}
