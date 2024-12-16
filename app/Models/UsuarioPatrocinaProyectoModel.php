<?php

namespace App\Models;

use CodeIgniter\Model;

class UsuarioPatrocinaProyectoModel extends Model #USA CLAVE "FICTICIA"
{
    protected $table = 'usuario_patrocina_proyecto';
    protected $primaryKey = 'id_usuario'; //ES UNA CLAVE "FICTICIA" NO USAR LAS FUNCIONES find() o save(), ya que ambas dependen de la clave primaria.
    protected $allowedFields = ['id_usuario', 'id_proyecto', 'fecha', 'monto']; // Campos permitidos para inserción/actualización
    protected $useAutoIncrement = false;
    protected $returnType = ProyectoModel::class;

    public function guardarPatrocinio($data)
    {
        return $this->db->table($this->table)->insert($data); // Inserción directa
    }


    public function obtenerProyectosConMontoPorUsuario($idUsuario)
    {

        $sql = 'SELECT p.*, u.monto 
                FROM `usuario_patrocina_proyecto` u 
                JOIN `proyectos` p 
                ON p.id_proyecto = u.id_proyecto 
                WHERE u.id_usuario = ?';
        $query = $this->db->query($sql, [$idUsuario]);
        return $query->getResult();
    }
    public function obtenerPatrociniosPorUsuario($idUsuario) #Creo que no se usa, fue remplazado por obtenerProyectosConMontoPorUsuario
    {
        return $this->where('id_usuario', $idUsuario)->findAll();
    }

    public function existePatrocinio($idUsuario, $idProyecto, $fecha) #No se si se usa
    {
        return $this->where([
            'id_usuario' => $idUsuario,
            'id_proyecto' => $idProyecto,
            'fecha' => $fecha
        ])->first();
    }
    public function getUsuariosPatrocinios($idProyecto)
    {
        return $this->select('id_usuario')
            ->where('id_proyecto', $idProyecto)
            ->distinct() // Garantiza que no haya repetidos
            ->findAll();
    }
}
