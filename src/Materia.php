<?php
class Materias {
    private $nombre_materia;
    private $docente_encargado;
    private $cant_alumnos;
    private $horas_curriculares;

    public function __construct($nombre_materia, $docente_encargado, $cant_alumnos, $horas_curriculares) 
    {
        $this->nombre_materia = $nombre_materia;
        $this->docente_encargado = $docente_encargado;
        $this->cant_alumnos = $cant_alumnos;
        $this->horas_curriculares = $horas_curriculares;
    }

    public function getNombreMateria() {
        return $this->nombre_materia;
    }

    public function getDocenteEncargado() {
        return $this->docente_encargado;
    }

    public function getCantidadAlumnos() {
        return $this->cant_alumnos;
    }

    public function getHorasCurriculares() {
        return $this->horas_curriculares;
    }
}