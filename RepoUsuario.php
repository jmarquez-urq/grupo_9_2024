<?php
require_once '.env.php'; 
require_once 'Usuario.php';

function credenciales() {
    return [
        'servidor' => 'localhost',
        'usuario' => 'root',
        'clave' => '',
        'base_de_datos' => 'alumno'
    ];
}

class RepoUsuario
{
    private static $conexion = null;

    public function __construct()
    {
        $credenciales = credenciales();
        if (is_null(self::$conexion)) {
            self::$conexion = new mysqli(
                $credenciales['servidor'],
                $credenciales['usuario'],
                $credenciales['clave'],
                $credenciales['base_de_datos']
            );

            if (self::$conexion->connect_error) {
                die('Error de conexión: ' . self::$conexion->connect_error);
            }

            self::$conexion->set_charset('utf8mb4');
        }
    }

    public function login($id_usuario, $clave)
    {
        $q = "SELECT id_usuario, clave FROM usuario WHERE nombre_usuario = ?;";
        $query = self::$conexion->prepare($q);
        
        if ($query === false) {
            throw new Exception('Error en la preparación de la consulta: ' . self::$conexion->error);
        }
        
        $query->bind_param("s", $nombre_usuario); 
        
        if ($query->execute()) {
            $query->bind_result($id_usuario, $nombre_usuario, $clave);
            if ($query->fetch()) {
                if (password_verify($clave, $clave_encriptada)) {
                    return new Usuario($id_usuario, $nombre_usuario, $clave);
                }
            }
        } else {
            throw new Exception('Error en la ejecución de la consulta: ' . $query->error);
        }
        
        return false;
    }

    function eliminar(Usuario $usuario)
    {
        $repo = new RepoUsuario();
        return $repo->eliminar($usuario);
    }

    public function save($nombre, $apellido, $usuario_empleado, $clave_empleado)
    {
        $q = "INSERT INTO usuario (nombre, apellido, usuario_empleado, clave) VALUES (?, ?, ?, ?);"; 
        $query = self::$conexion->prepare($q);
        
        if ($query === false) {
            throw new Exception('Error en la preparación de la consulta: ' . self::$conexion->error);
        }
        
        $clave_encriptada = password_hash($clave_empleado, PASSWORD_DEFAULT);

        $query->bind_param("ssss", $nombre, $apellido, $usuario_empleado, $clave_encriptada);
        if ($query->execute()) {
            return self::$conexion->insert_id;
        } else {
            throw new Exception('Error en la ejecución de la consulta: ' . $query->error);
        } 
    
    }
}
