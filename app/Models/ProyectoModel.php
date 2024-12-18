<?php

namespace App\Models;

use CodeIgniter\Model;

class ProyectoModel extends Model
{
    protected $table = 'proyectos';
    protected $primaryKey = 'id_proyecto';

    protected $allowedFields = ['id_proyecto', 'nombre', 'plan_recompensas', 'fecha_limite', 'detalle', 'impacto_esperado', 'activo', 'objetivo', 'presupuesto_requerido', 'id_usuario_creador', 'id_usuario_creador', 'imagen_principal'];

    protected $returnType = ProyectoModel::class;
}
