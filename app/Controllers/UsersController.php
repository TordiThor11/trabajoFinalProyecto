<?php

namespace App\Controllers;
use App\Models\UserModel;

class UsersController extends BaseController
{
    public function index(): string
    {
        return view('welcome_message');
    }

    public function list(): string
    {
        #$query = $this->db->query("select * from actor"); DE ESTA FORMA ESTAS ACCEDIENDO CON EL ESTANDAR
        #$usuariosBD = $query->getResult();

        $userModel = new UserModel(); # DE ESTA FORMA ESTAS ACCEDIENDO CON LA AYUDA DEL FRAMEWORK
        $usuariosBD = $userModel->findAll();

        dd($usuariosBD);

        $data = [
            'nombre1' => 'Angel',
            'usuarios' => ['angel', 'tordi', 15000]
        ];

        $data['nombre2'] = 'Ezequiel';

        return view('users/list', $data);
    }
}
