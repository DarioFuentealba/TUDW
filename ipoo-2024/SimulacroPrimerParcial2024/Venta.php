<?php
/*
En la clase Venta:
1. Se registra la siguiente información: número, fecha, referencia al cliente, referencia a una colección de motos y el precio final.
2. Método constructor que recibe como parámetros cada uno de los valores a ser asignados a cada atributo de la clase.
3. Los métodos de acceso de cada uno de los atributos de la clase.
4. Redefinir el método _toString para que retorne la información de los atributos de la clase.
5. Implementar el método incorporarMoto($objMoto) que recibe por parámetro un objeto moto y lo incorpora a la colección de motos de la venta, siempre y cuando sea posible la venta. El método cada vez que incorpora una moto a la venta, debe actualizar la variable instancia precio final de la venta.

Utilizar el método que calcula el precio de venta de la moto donde crea necesario.
*/

include_once("Cliente.php");
include_once("Moto.php");

//Creo la clase y sus atributos
class Venta{
    private $nro;
    private $fecha;
    private $objCliente;
    private $colMoto;
    private $precioFinal;

    //Creo la función constructora
    public function __construct($pnro, $pfecha, $pobjCliente){
        $this->nro = $pnro;
        $this->fecha = $pfecha;
        $this->objCliente = $pobjCliente;
        $this->colMoto = [];
        $this->precioFinal = 0;
    }


    /*************** MÉTODOS DE ACCESO ***************/
    /********************* SETERS ********************/


    //Setea el valor de nro
    public function setNro($nro){
        $this->nro = $nro;
    }

    //Setea el valor de fecha
    public function setFecha($fecha){
        $this->fecha = $fecha;
    }

    //Setea el valor de objCliente
    public function setObjCliente($objCliente){
        $this->objCliente = $objCliente;
    }

    //Setea el valor de colMoto
    public function setColMoto($colMoto){
        $this->colMoto = $colMoto;
    }

    //Setea el valor de precioFinal
    public function setPrecioFinal($precioFinal){
        $this->precioFinal = $precioFinal;
    }


    /*************** MÉTODOS DE ACCESO ***************/
    /********************* GETERS ********************/


    //Obtiene el valor de nro
    public function getNro(){
        return $this->nro;
    }

    //Obtiene el valor de fecha
    public function getFecha(){
        return $this->fecha;
    }

    //Obtiene el valor de objCliente
    public function getObjCliente(){
        return $this->objCliente;
    }

    //Obtiene el valor de colMoto
    public function getColMoto(){
        return $this->colMoto;
    }

    //Obtiene el valor de precioFinal
    public function getPrecioFinal(){
        return $this->precioFinal;
    }


    /******************* toString ********************/


    public function __toString(){
        $msjToString = "\n\nN° de venta: ".$this->getNro()."\nFecha en que se realizó la venta: ".$this->getFecha()."\nDatos del cliente que compró la moto: ".$this->getObjCliente()."\nDatos de las motos: ".$this->datosMotos()."\nPrecio final: ".$this->getPrecioFinal()."\n\n";

        return $msjToString;
    }


    /***************** OTROS MÉTODOS *****************/


    /**
     * Mostrar datos de las motos
     * @return STRING $cadena
     */
    public function datosMotos(){
        $colM = $this->getColMoto();
        $cadena = "";

        //Uso for porque se cuantos ciclos hara
        for($i = 0; $i < count($colM); $i++){
            $cadena .= $colM[$i]."\n---------------\n";
        }
        return $cadena;
    }


    /**
     * Recibe por parámetro un objeto moto y lo incorpora a la colección de motos de la venta, siempre y cuando sea posible la venta.
     * El método cada vez que incorpora una moto a la venta, debe actualizar la variable instancia precio final de la venta.

     * Utilizar el método que calcula el precio de venta de la moto donde crea necesario.
     * @param OBJ $objMoto
     */
    public function incorporarMoto($objMoto){
        //Inicializo variables
        $colM = $this->getColMoto();
        $precioFinal = $this->getPrecioFinal();

        if($objMoto->darPrecioVenta($objMoto) >= 0){ //Si esta disponible para la venta

            array_push($colM, $objMoto); //Agrego el objeto a la coleccion de motos
            $this->setColMoto($colM); //Seteo la coleccion de motos

            $precioFinal += $objMoto->darPrecioVenta($objMoto);
            $this->setPrecioFinal($precioFinal); //Seteo el precio final
        }
    }
}