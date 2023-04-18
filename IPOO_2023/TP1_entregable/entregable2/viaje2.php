<?php

/*
Modificar la clase Viaje para que ahora los pasajeros sean un objeto que tenga los atributos nombre, apellido, numero de documento y teléfono. El viaje ahora contiene una referencia a una colección de objetos de la clase Pasajero. También se desea guardar la información de la persona responsable de realizar el viaje, para ello cree una clase ResponsableV que registre el número de empleado, número de licencia, nombre y apellido. La clase Viaje debe hacer referencia al responsable de realizar el viaje.

Volver a implementar las operaciones que permiten modificar el nombre, apellido y teléfono de un pasajero. Luego implementar la operación que agrega los pasajeros al viaje, solicitando por consola la información de los mismos. Se debe verificar que el pasajero no este cargado mas de una vez en el viaje. De la misma forma cargue la información del responsable del viaje.

Nota: Recuerden que deben enviar el link a la resolución en su repositorio en GitHub.
*/

//Creo la clase y sus atributos
class viaje2{
    private $codigo;
    private $destino;
    private $cantMaxPasajeros;
    private $pasajero;
    private $responsable;


    //Creo la funcion constructora
    public function __construct($pcodigo, $pdestino, $pcantMaxPasajeros, $ppasajero, $presponsable){
        $this -> codigo = $pcodigo;
        $this -> destino = $pdestino;
        $this -> cantMaxPasajeros = $pcantMaxPasajeros;
        $this -> pasajero = $ppasajero;
        $this -> responsable = $presponsable;
    }


    /*************************************************/
    /*MODULOS QUE SETEAN LOS VALORES DE LOS ATRIBUTOS*/
    /*************************************************/

    /**
    * Setea el valor de codigo
    */
    public function setCodigo($codigo){
        $this -> codigo = $codigo;
    }

    /**
     * Setea el valor de destino
     */
    public function setDestino($destino){
        $this -> destino = $destino;
    }

    /**
     * Setea el valor de cantMaxPasajeros
     */
    public function setCantMaxPasajeros($cantMaxPasajeros){
        $this -> cantMaxPasajeros = $cantMaxPasajeros;
    }

    /**
     * Setea el valor de pasajero
     */
    public function setPasajero($pasajero){
        $this -> pasajero = $pasajero;
    }

    /**
     * Setea el valor de responsable
     */
    public function setResponsable($responsable){
        $this -> responsable = $responsable;
    }


    /**************************************/
    /*MODULOS QUE OBTIENEN (RETORNA) LOS VALORES DE LOS ATRIBUTOS*/
    /**************************************/

    /**
    * Obtiene el valor de codigo
    */
    public function getCodigo(){
        return $this -> codigo;
    }

    /**
    * Obtiene el valor de pdestinoB
    */
    public function getDestino(){
        return $this -> destino;
    }

    /**
    * Obtiene el valor de cantMaxPasajeros
    */
    public function getCantMaxPasajeros(){
        return $this -> cantMaxPasajeros;
    }

    /**
    * Obtiene el valor de pasajero
    */
    public function getPasajero(){
        return $this -> pasajero;
    }

    /**
    * Obtiene el valor de responsable
    */
    public function getResponsable(){
        return $this -> responsable;
    }



    public function __toString(){
        $cadena = "\n\nCódigo del viaje: ".$this->getCodigo()."\n\nDestino: ".$this->getDestino()."\n\nCant Máx Pasajeros: ".$this->getCantMaxPasajeros()."\n\nLos datos de los pasajero son: ".$this->getPasajero()."\n\nLos datos del responsable son: ".$this->getResponsable()./*$this->mostrarDatosPasajeros().*/"\n";
        return $cadena;
    }
    
}