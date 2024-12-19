<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'usuarios';
    protected $primaryKey = 'id_usuario';
    protected $allowedFields = ['mail', 'nombre', 'apellido', 'contrasenia', 'tipo_usuario'];

    public function verificarUsuario($mail, $contrasenia)
    {
        $usuario = $this->where('mail', $mail)->first();

        if ($usuario && $usuario['contrasenia'] === $contrasenia) {
            return $usuario;
        }

        return false;
    }

    public function registrarUsuario($data)
    {
        // Guarda el usuario en la base de datos
        return $this->insert($data);
    }

    public function obtenerPromedioPuntuacion($idUsuario)
    {
        $db = db_connect();
        $query = $db->query("
        SELECT 
            AVG(p.puntuacion) AS promedio
        FROM 
            proyecto_puntuacion p
        JOIN 
            proyectos pr ON p.id_proyecto = pr.id_proyecto
        WHERE 
            pr.id_usuario_creador = ?
        GROUP BY 
            pr.id_usuario_creador;
    ", [$idUsuario]);

        $resultado = $query->getRow();
        return $resultado->promedio ?? 0;
    }
}
