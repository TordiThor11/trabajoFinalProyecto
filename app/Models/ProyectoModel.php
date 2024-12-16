<?php

namespace App\Models;

use CodeIgniter\Model;

class ProyectoModel extends Model
{
    protected $table = 'proyectos';
    protected $primaryKey = 'id_proyecto';

    protected $allowedFields = ['id_proyecto', 'nombre', 'plan_recompensas', 'fecha_limite', 'detalle', 'impacto_esperado', 'activo', 'objetivo', 'presupuesto_requerido', 'id_usuario_creador', 'id_usuario_creador', 'imagen_principal', 'avance_total'];

    protected $returnType = ProyectoModel::class;

    public function agregarAvance($idProyecto, $avanceAgregado)
    {
        // Encuentra el proyecto por su ID
        $proyecto = $this->find($idProyecto);

        // Verifica si el proyecto existe
        if (!$proyecto) {
            throw new \Exception("El proyecto no existe.");
        }

        // Convierte el objeto en un array para usarlo en el método update
        $proyectoArray = (array) $proyecto;

        // Calcula el nuevo avance
        $nuevoAvance = $proyectoArray['avance_total'] + $avanceAgregado;

        // Actualiza solo el campo 'avance_total'
        $this->update($idProyecto, ['avance_total' => $nuevoAvance]);
    }
}
