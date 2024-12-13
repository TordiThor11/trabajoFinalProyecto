<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\NotificacionModel;

class NotificacionesController extends BaseController
{
    public function ListarNotificaciones()
    {
        $session = session();
        $id_usuario = $session->get('id_usuario');

        $model = new NotificacionModel();
        $data['notificaciones'] = $model->where('id_usuario', $id_usuario)->findAll();

        return $this->layout('view_notificaciones.php', $data);
    }
}
