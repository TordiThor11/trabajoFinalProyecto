<?php

namespace App\Models;

use CodeIgniter\Model;

class VersionModel extends Model
{
    protected $table = 'versiones';
    protected $primaryKey = 'id_version';
    protected $allowedFields = ['id_version', 'nombre', 'id_proyecto', 'descripcion', 'fecha', 'avance_agregado'];
    protected $returnType = VersionModel::class;

    public function obtenerActualizaciones($idProyecto) //no se usa, se remplazo por findall dado por codeigniter
    {

        $sql = 'SELECT * FROM `versiones` WHERE id_proyecto = ?;';
        $query = $this->db->query($sql, [$idProyecto]);
        return $query->getResult();
    }
}
