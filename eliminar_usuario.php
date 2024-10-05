<?php
require_once 'Usuario.php';
require_once 'ControlSesion.php';

session_start();
if (isset($_SESSION['usuario'])) {
    $usuario = unserialize($_SESSION['usuario']);
} else {
    header('Location: index.php');
}

if (empty($_POST['usuario']) || $_POST['usuario'] != $usuario->id_usuario) {
    header("Location: Error de eliminación del usuario");
    die();
}

$cs = new ControlSesion();

$resultado = $cs->eliminar($usuario);

if ($resultado) {
    $redirigir = "index.php?mensaje=Usuario eliminado";
    session_destroy();
} else {
    $redirigir = "Error: No se puede realizar esta acción";
}

header("Location: $redirigir");