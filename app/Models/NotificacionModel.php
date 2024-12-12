<?php

namespace App\Models;

use CodeIgniter\Model;

class NotificacionModel extends Model
{
    protected $table = 'notificaciones';
    protected $primaryKey = 'id_notificacion';
    protected $allowedFields = ['id_notificacion', 'fecha', 'titulo', 'id_usuario', 'mensaje', 'leido'];
    protected $returnType = NotificacionModel::class;

    public function recuperarNotificacionesNoLeidas($idUsuario)
    {
        return $this->where('id_usuario', $idUsuario)->where('leido', 0)->findAll();
    }
}
