<?php
class Docentes{
    private $num_matricula;
    private $nombre;
    private $apellido;
    private $materia;

    public function __construct($num_matricula, $nombre, $apellido, $materia) {
        $this->num_matricula = $num_matricula;
        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->materia = $materia;
    }

    public function getNumLegajo() {
        return $this->num_matricula;
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function getApellido() {
        return $this->apellido;
    }

    public function getMateria() {
        return $this->materia;
    }


}