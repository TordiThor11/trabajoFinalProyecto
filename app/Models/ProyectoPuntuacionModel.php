<?php

namespace App\Models;

use CodeIgniter\Model;

class ProyectoPuntuacionModel extends Model
{
    protected $table = 'proyecto_puntuacion';
    protected $primaryKey = 'id_valoracion';

    protected $allowedFields = ['id_valoracion', 'id_usuario', 'id_proyecto', 'puntuacion', 'fecha'];

    protected $returnType = ProyectoModel::class;
}
