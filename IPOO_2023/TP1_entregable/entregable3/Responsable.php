<?php

/*
La empresa de transporte desea gestionar la información correspondiente a los pasajeros de los Viajes que pueden ser: Pasajeros estándares, Pasajeros VIP y Pasajeros con necesidades especiales. 

La clase Pasajero tiene como atributos el nombre, el número de asiento y el número de ticket del pasaje del viaje. La clase "PasajeroVIP" tiene como atributos adicionales el número de viajero frecuente y cantidad de millas de pasajero. La clase Pasajeros con necesidades especiales se refiere a pasajeros que pueden requerir servicios especiales como sillas de ruedas, asistencia para el embarque o desembarque, o comidas especiales para personas con alergias o restricciones alimentarias.  Implementar el método darPorcentajeIncremento() que retorne el porcentaje que debe aplicarse como incremento según las características del pasajero. Para un pasajero VIP se incrementa el importe un 35% y si la cantidad de millas acumuladas supera a las 300 millas se realiza un incremento del 30%. Si el pasajero tiene necesidades especiales y requiere silla de ruedas, asistencia y comida especial entonces el pasaje tiene un incremento del 30%; si solo requiere uno de los servicios prestados entonces el incremento es del 15%. Por último, para los pasajeros comunes el porcentaje de incremento es del 10 %.


Modificar la clase viaje para almacenar el costo del viaje, la suma de los costos abonados por los pasajeros e implementar el método venderPasaje($objPasajero) que debe incorporar el pasajero a la colección de pasajeros ( solo si hay espacio disponible), actualizar los costos abonados y retornar el costo final que deberá ser abonado por el pasajero.


Implemente la función hayPasajesDisponible() que retorna verdadero si la cantidad de pasajeros del viaje es menor a la cantidad máxima de pasajeros y falso caso contrario
*/

//Creo la clase y sus atributos
class Responsable{
    private $nroEmpleado;
    private $nroLicencia;
    private $nombre;
    private $apellido;


    //Creo la función constructora
    public function __construct($pnroEmpleado, $pnroLicencia, $pnombre, $papellido){
        $this->nroEmpleado = $pnroEmpleado;
        $this->nroLicencia = $pnroLicencia;
        $this->nombre = $pnombre;
        $this->apellido = $papellido;
    }


    /*************************************************/
    /*************** MÉTODOS DE ACCESO ***************/
    /********************* SETERS ********************/
    /*************************************************/

    /**
     * Setea el valor de nroEmpleado
     * @param $nroEmpleado
     */
    public function setNroEmpleado($nroEmpleado){
        $this->nroEmpleado = $nroEmpleado;
    }
    
    /**
     * Seteal el valor de nroLicencia
     * @param $nroLicencia
     */
    public function setNroLicencia($nroLicencia){
        $this->nroLicencia = $nroLicencia;
    }
    
    /**
     * Seteal el valor de nombre
     * @param $nombre
     */
    public function setNombre($nombre){
        $this->nombre = $nombre;
    }

    /**
     * Seteal el valor de apellido
     * @param $apellido
     */
    public function setApellido($apellido){
        $this->apellido = $apellido;
    }


    /*************************************************/
    /*************** MÉTODOS DE ACCESO ***************/
    /********************* GETERS ********************/
    /*************************************************/

    /**
     * Obtiene el valor de nroEmpleado
     */
    public function getNroEmpleado(){
        return $this->nroEmpleado;
    }

    /**
     * Obtiene el valor de nroLicencia
     */
    public function getNroLicencia(){
        return $this->nroLicencia;
    }

    /**
     * Obtiene el valor de nombre
     */
    public function getNombre(){
        return $this->nombre;
    }

    /**
     * Obtiene el valor de apellido
     */
    public function getApellido(){
        return $this->apellido;
    }

    


    /*************************************************/
    /******************* toString ********************/
    /*************************************************/

    public function __toString(){
        $msjToString = "\n  N° empleado: ".$this->getNroEmpleado()."\n  N° licencia: ".$this->getNroLicencia()."\n  Nombre: ".$this->getNombre()."\n  Apellido: ".$this->getApellido()."\n\n";
        return $msjToString;
    }



    


    







}