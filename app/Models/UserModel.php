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
        SELECT AVG(puntuacion) AS promedio
        FROM proyecto_puntuacion
        WHERE id_usuario = ?;
    ", [$idUsuario]);

        $resultado = $query->getRow();
        return $resultado->promedio ?? 0;
    }
}
