<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\NotificacionModel;
use App\Models\ProyectoModel;

class NotificacionesController extends BaseController
{
    public function ListarNotificaciones()
    {
        $session = session();
        $id_usuario = $session->get('id_usuario');

        // Cargar las notificaciones del usuario
        $notificacionModel = new NotificacionModel();
        $notificaciones = $notificacionModel->where('id_usuario', $id_usuario)->findAll();

        if (!empty($notificaciones)) {
            // Extraer los IDs de proyecto de las notificaciones
            $proyecto_ids = array_map(function ($notificacion) {
                return $notificacion->id_proyecto;
            }, $notificaciones);

            // Cargar los proyectos correspondientes a esos IDs
            $proyectoModel = new ProyectoModel();
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

        return $this->layout('view_notificaciones.php', $notificaciones);
    }


    public function marcarTodasLeidas()
    {
        $session = session();
        $id_usuario = $session->get('id_usuario');

        // Carga el modelo
        $notificacionModel = new \App\Models\NotificacionModel();

        // Actualiza todas las notificaciones que aún no estén marcadas como leídas
        $notificacionModel->marcarTodoLeido($id_usuario);

        // Devuelve una respuesta JSON
        return $this->response->setJSON(['status' => 'success', 'message' => 'Notificaciones actualizadas']);
    }
}
