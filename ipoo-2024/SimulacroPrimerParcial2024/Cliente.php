<?php
/*
En la clase Cliente:
0. Se registra la siguiente información: nombre, apellido, si está o no dado de baja, el tipo y el número de documento. Si un cliente está dado de baja, no puede registrar compras desde el momento de su baja.
1. Método constructor que recibe como parámetros los valores iniciales para los atributos.
2. Los métodos de acceso de cada uno de los atributos de la clase.
3. Redefinir el método _toString para que retorne la información de los atributos de la clase.
*/

//Creo la clase y sus atributos
class Cliente{
    private $nombre;
    private $apellido;
    private $baja; //Si un cliente está dado de baja, no puede registrar compras desde el momento de su baja.
    private $tipoDNI;
    private $nroDNI;

    //Creo la función constructora
    public function __construct($pnombre, $papellido, $pbaja, $ptipoDNI, $pnroDNI){
        $this->nombre = $pnombre;
        $this->apellido = $papellido;
        $this->baja = $pbaja;
        $this->tipoDNI = $ptipoDNI;
        $this->nroDNI = $pnroDNI;
    }


    /*************** MÉTODOS DE ACCESO ***************/
    /********************* SETERS ********************/


    //Setea el valor de nombre
    public function setNombre($nombre){
        $this->nombre = $nombre;
    }

    //Setea el valor de apellido
    public function setApellido($apellido){
        $this->apellido = $apellido;
    }

    //Setea el valor de baja
    public function setBaja($baja){
        $this->baja = $baja;
    }

    //Setea el valor de tipoDNI
    public function setTipoDNI($tipoDNI){
        $this->tipoDNI = $tipoDNI;
    }

    //Setea el valor de nroDNI
    public function setNroDNI($nroDNI){
        $this->nroDNI = $nroDNI;
    }


    /*************** MÉTODOS DE ACCESO ***************/
    /********************* GETERS ********************/


    //Obtiene el valor de nombre
    public function getNombre(){
        return $this->nombre;
    }

    //Obtiene el valor de apellido
    public function getApellido(){
        return $this->apellido;
    }

    //Obtiene el valor de baja
    public function getBaja(){
        return $this->baja;
    }

    //Obtiene el valor de tipoDNI
    public function getTipoDNI(){
        return $this->tipoDNI;
    }

    //Obtiene el valor de nroDNI
    public function getNroDNI(){
        return $this->nroDNI;
    }


    /******************* toString ********************/


    public function __toString(){
        $msjToString = "\n\nNombre del cliente: ".$this->getNombre()."\nApellido  del cliente: ".$this->getApellido()."\n¿Está dado de baja? ".$this->getBaja()."\nTipo de documento: ".$this->getTipoDNI()."\nN° de documento: ".$this->getNroDNI()."\n\n";

        return $msjToString;
    }


        /******************* OTROS METODOS ********************/


    /**
     * Lo que hace esta funcion es evaluar el estado y tipo de valor
     * y nos devolvera un string
     * @return String $estado
     */
    public function estadoCliente(){
        $estado=$this->getEstado();
        return $estado?"Puede realizar compras":"No puede realizar compras";
    }
}