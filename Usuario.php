<?php
class Usuario {
    private $nombre;
    private $apellido;
    private $id_usuario;
    private $nombre_usuario;
    private $clave;

    public function __construct($nombre, $apellido, $id_usuario, $nombre_usuario, $clave) {
        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->id_usuario = $id_usuario;
        $this->nombre_usuario = $nombre_usuario;
        $this->clave = $clave;
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function getApellido() {
        return $this->apellido;
    }

    public function getIdUsuario() {
        return $this->id_usuario;
    }

    public function getNombreUsuario() {
        return $this->nombre_usuario;
    }

    public function getClave() {
        return $this->clave;
    }
}
