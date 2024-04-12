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
            $codigo = $colM[$i]->getCodigo();
            $costo = $colM[$i]->getCosto();
            $anioFabricacion = $colM[$i]->getAnioFabricacion();
            $descripcion = $colM[$i]->getDescripcion();
            $porcentajeIncrementoAnual = $colM[$i]->getPorcentajeIncrementoAnual();
            $activa = $colM[$i]->getActiva();

            if($activa){
                $msj = "Sí";
            }else{
                $msj = "No";
            }

            $cadena .= "\n    Moto N° ".($i+1)."\n        Código: ".$codigo."\n        Costo $".$costo."\n        Año de fabricación: ".$anioFabricacion."\n        Descripción: ".$descripcion."\n        Porcentaje de incremento anual $".$porcentajeIncrementoAnual."\n        Disponible para la venta: ".$msj;
        }
        return $cadena;
    }


        /**
     *darPrecioVenta el cual calcula el valor por el cual puede ser vendida una moto.
     *Si la moto no se encuentra disponible para la venta retorna un valor < 0. Si la moto está disponible para la venta, el método realiza el siguiente cálculo:
     *$_venta = $_compra + $_compra * (anio * por_inc_anual)
     *donde $_compra: es el costo de la moto.
     *anio: cantidad de años transcurridos desde que se fabricó la moto.
     *por_inc_anual: porcentaje de incremento anual de la moto.
    
     *date("Y") me da el año actual
     *  @return FLOAT $precioVenta
     *//*
    public function darPrecioVenta($objMoto){
        if($objMoto->getActiva()){
            $aniosDesdeQueSeFabrico = date("Y") - $objMoto->getAnioFabricacion();
            $precioVenta = $objMoto->getCosto() + $objMoto->getCosto() * ($aniosDesdeQueSeFabrico * $objMoto->getPorcentajeIncrementoAnual());
        }else{
            $precioVenta = -1;
        }
        return $precioVenta;
    }*/


    /**
     * Recibe por parámetro un objeto moto y lo incorpora a la colección de motos de la venta, siempre y cuando sea posible la venta.
     * El método cada vez que incorpora una moto a la venta, debe actualizar la variable instancia precio final de la venta.

     * Utilizar el método que calcula el precio de venta de la moto donde crea necesario.
     * @param OBJ $objMoto
     */
    public function incorporarMoto($objMoto){
        //Inicializo variables
        $colM = $this->getColMoto();

        if($objMoto->getActiva()){
            $precioVenta = $objMoto->darPrecioVenta(); //Uso la funcion que esta en la clase Moto
            $objMoto->setCosto($precioVenta); //Seteo el valor del costo

            array_push($colM, $objMoto); //Agrego el objeto a la coleccion de motos
            $this->setColMoto($colM); //Seteo la coleccion de motos
        }
    }
}