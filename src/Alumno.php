<?php
class Alumno{
    private $num_legajo;
    private $nombre;
    private $apellido;
    private $nota;

    public function __construct($num_legajo, $nombre, $apellido, $nota) {
        $this->num_legajo = $num_legajo;
        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->nota = $nota;
    }

    public function getNumLegajo() {
        return $this->num_legajo;
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function getApellido() {
        return $this->apellido;
    }

    public function getNota() {
        return $this->nota;
    }

}