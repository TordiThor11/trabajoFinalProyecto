<?php

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class AdminFilter implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        // No se necesita lógica antes en este caso
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {

        $session = session();
        $tipoDeSession = $session->get('tipo_usuario');
        // Verificar si el usuario es un administrador
        if ($tipoDeSession === "1") {
            // Redirigir a la pagina del administrador en caso de ser correspondido
            dd("El usuario es admin, deberia ser redirigido a la pagina del admin");
            // return redirect()->to(base_url('login'))->with('error', 'Debes iniciar sesión para acceder.');
        }
    }
}
