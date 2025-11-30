<?php 

class Tarea {
    private $descripcion;
    private $prioridad;

    public function __construct( $descripcion,  $prioridad){
        $this->descripcion = $descripcion;
        $this->prioridad = $prioridad;
    }
	
    public function getDescripcion() {
        return $this->descripcion;
    }

	public function getPrioridad() {
        return $this->prioridad;
    }
	
    public function setDescripcion( $descripcion): void {
        $this->descripcion = $descripcion;
    }

	public function setPrioridad( $prioridad): void {
        $this->prioridad = $prioridad;
    }

    public function __toString() {
        return "$this->descripcion  $this->prioridad";
    }
}



?>