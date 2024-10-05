<?php
require_once 'RepoUsuario.php';
require_once 'Usuario.php';

class ControlSesion
{
    public function login($nombre_usuario, $clave)
    {
        $repo = new RepoUsuario();
        $usuario = $repo->login($nombre_usuario, $clave);

        if ($usuario === false) {
            throw new Exception("Credenciales incorrectas");
        }

        session_start();
        $_SESSION['usuario'] = serialize($usuario);
        return [true, "Usuario cargado correctamente"];
    }

    function eliminar(Usuario $usuario)
    {
        $repo = new RepoUsuario();
        return $repo->eliminar($usuario);
    }

    
    public function create($nombre, $apellido, $nombre_usuario, $id_usuario, $clave)
    {
        $repo = new RepoUsuario();
        
        
        $usuario = new Usuario($nombre, $apellido, $nombre_usuario, $id_usuario, $clave);

        $nombre = $nombre->getNombre();
        $apellido = $apellido->getApellido();
        $nombre_usuario = $nombre_usuario->getNombreUsuario();
        $id_usuario = $id_usuario->getIdUsuario();
        $clave = $clave->getClave();

        $id_usuario= $repo->save($nombre, $apellido, $nombre_usuario, $clave);

        if ($id_usuario === false) {
            return [false, "No se pudo crear el usuario"];
        }

        session_start();
        $_SESSION['usuario'] = serialize($usuario);
        return [true, "Usuario creado exitosamente"];
    }

   /* FUNCION SIN TERMINAR, EN DESARROLLO 
   public function modificar(string $nombre_usuario, string $nombre, string $apellido, Usuario $usuario)
    {
        if (isset($_SESSION['usuario'])) {
    
            $usuario = unserialize($_SESSION['usuario']);
        
        $repo = new RepoUsuario();}

        if ($repo->modificar($nombre_usuario, $nombre, $apellido, $usuario))
        {
            $usuario->setDatos($usuario_empleado, $nombre_persona, $apellido_persona);
            $_SESSION['usuario'] = serialize($usuario);

            return true;
        } else {
            return false;
        }
    }*/
}
