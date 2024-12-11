<?php

namespace App\Models;

use CodeIgniter\Model;

class VersionModel extends Model
{
    protected $table = 'versiones';
    protected $primaryKey = 'id_version';
    protected $allowedFields = ['id_version', 'nombre', 'id_proyecto', 'descripcion', 'fecha'];
    protected $returnType = ProyectoModel::class;
}
