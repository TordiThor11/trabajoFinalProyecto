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
        // Obtengo el avance actual del proyecto
        $proyecto = $this->find($idProyecto);
        $avanceActual = $proyecto->avance_total;

        // Calculo el nuevo avance
        $nuevoAvance = $avanceActual + $avanceAgregado;

        // Si el nuevo avance supera 100, lo limito a 100
        if ($nuevoAvance > 100) {
            $nuevoAvance = 100;
        }

        // Actualizo el avance total del proyecto
        $this->update($idProyecto, ['avance_total' => $nuevoAvance]);
    }
}
