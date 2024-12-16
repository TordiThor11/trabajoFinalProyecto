<?php

namespace App\Models;

use CodeIgniter\Model;

class NotificacionModel extends Model
{
    protected $table = 'notificaciones';
    protected $primaryKey = 'id_notificacion';
    protected $allowedFields = ['id_notificacion', 'fecha', 'titulo', 'id_usuario', 'mensaje', 'leido', 'id_proyecto'];
    protected $returnType = NotificacionModel::class;

    public function recuperarNotificacionesNoLeidas($idUsuario)
    {
        return $this->where('id_usuario', $idUsuario)->where('leido', 0)->findAll();
    }
    public function marcarLeido($idNotificacion)
    {
        /*$notificacion = $this->find($idNotificacion);
        // Convierte el objeto en un array para usarlo en el método update
        $notificacionArray = (array) $notificacion;*/

        // Actualiza solo el campo 'avance_total'
        return $this->update($idNotificacion, ['leido' => 1]);
    }
    public function marcarTodoLeido($idUsuario)
    {
        return $this->where('leido', 0)->where('id_usuario', $idUsuario)->set(['leido' => 1])->update();
    }
}
