<?php

require_once 'clases/Usuario.php';
require_once 'clases/ControlSesion.php';

session_start();

if (isset($_SESSION['usuario'])) {
    $usuario = unserialize( $_SESSION['usuario']);
} else {
    header('Location: index.php');
    exit;
}

if (isset($_GET['mensaje'])) {
    echo '<div id="mensaje" class="alert alert-primary text-center">
      <p>'.$_GET['mensaje'].'</p></div>';
}
?>



<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <title>Sistema</title>
</head>
<section class="container">
    <div class="titulo">
        <h1>Biblioteca Ecos Del Pasado</h1>
    </div>
    <div class="texto">
        <h3>Modificar datos de usuario</h3>
        <form action="modificar.php" method="post">
            <label for="id_usuario">Usuario</label>
            <input name="usuario_empleado" class="input" value="<?php echo $usuario->id_usuario; ?>"><br>
            <label for="nombre">Nombre</label>
            <input name="nombre" class="input" value="<?php echo $usuario->nombre; ?>"><br>
            <label for="apellido">Apellido</label>
            <input name="apellido" class="input" value="<?php echo $usuario->apellido; ?>"><br>
            <button type="submit" value="Modificar datos" class="button">Actualizar datos</button>
        </form>
    </div>
</section>
</html>