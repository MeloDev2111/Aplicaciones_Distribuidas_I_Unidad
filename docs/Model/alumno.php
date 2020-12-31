<?php
class Alumno{
    private $DNI;
    private $nombreAlumno;
    private $apellidoAlumno;
        
    function __construct($dni, $nombre, $apellido){
            $this->DNI = $dni;
            $this->nombreAlumno = $nombre;
            $this->apellidoAlumno = $apellido;
    } 
    
    public function getApellidoAlumno(){
        return $this->apellidoAlumno;
    }

    public function setApellidoAlumno($apellidoAlumno){
        $this->apellidoAlumno = $apellidoAlumno;
        return $this;
    }

    public function getNombreAlumno(){
        return $this->nombreAlumno;
    }

    public function setNombreAlumno($nombreAlumno){
        $this->nombreAlumno = $nombreAlumno;
        return $this;
    }

    public function saludar(){
        echo "Hola CPP";
    }
}
?>