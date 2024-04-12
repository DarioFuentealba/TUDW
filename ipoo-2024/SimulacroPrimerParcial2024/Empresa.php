<?php
/*
En la clase Empresa:
1. Se registra la siguiente información: denominación, dirección, la colección de clientes, colección de motos y la colección de ventas realizadas.
2. Método constructor que recibe como parámetros los valores iniciales para los atributos de la clase.
3. Los métodos de acceso para cada una de las variables instancias de la clase.
4. Redefinir el método _toString para que retorne la información de los atributos de la clase.
5. Implementar el método retornarMoto($codigoMoto) que recorre la colección de motos de la Empresa y
retorna la referencia al objeto moto cuyo código coincide con el recibido por parámetro.
6. Implementar el método registrarVenta($colCodigosMoto, $objCliente) método que recibe por parámetro una colección de códigos de motos, la cual es recorrida, y por cada elemento de la colección se busca el objeto moto correspondiente al código y se incorpora a la colección de motos de la instancia Venta que debe ser creada. Recordar que no todos los clientes ni todas las motos, están disponibles
para registrar una venta en un momento determinado.
El método debe setear los variables instancias de venta que corresponda y retornar el importe final de la venta.
7. Implementar el método retornarVentasXCliente($tipo,$numDoc) que recibe por parámetro el tipo y número de documento de un Cliente y retorna una colección con las ventas realizadas al cliente.
*/

include_once("Cliente.php");
include_once("Moto.php");
include_once("Venta.php");

//Creo la clase y sus atributos
class Empresa{
    private $denominacion;
    private $direccion;
    private $colCliente;
    private $colMoto;
    private $colVenta;

    //Creo la función constructora
    public function __construct($pdenominacion, $pdireccion, $pcolCliente, $pcolMoto, $pcolVenta){
        $this->denominacion = $pdenominacion;
        $this->direccion = $pdireccion;
        $this->colCliente = $pcolCliente;
        $this->colMoto = $pcolMoto;
        $this->colVenta = $pcolVenta;
    }


    /*************** MÉTODOS DE ACCESO ***************/
    /********************* SETERS ********************/


    //Setea el valor de denominacion
    public function setDenominacion($denominacion){
        $this->denominacion = $denominacion;
    }

    //Setea el valor de direccion
    public function setDireccion($direccion){
        $this->direccion = $direccion;
    }

    //Setea el valor de colCliente
    public function setColCliente($colCliente){
        $this->colCliente = $colCliente;
    }

    //Setea el valor de colMoto
    public function setColMoto($colMoto){
        $this->colMoto = $colMoto;
    }

    //Setea el valor de colVenta
    public function setColVenta($colVenta){
        $this->colVenta = $colVenta;
    }


    /*************** MÉTODOS DE ACCESO ***************/
    /********************* GETERS ********************/


    //Obtiene el valor de denominacion
    public function getDenominacion(){
        return $this->denominacion;
    }

    //Obtiene el valor de direccion
    public function getDireccion(){
        return $this->direccion;
    }

    //Obtiene el valor de colCliente
    public function getColCliente(){
        return $this->colCliente;
    }

    //Obtiene el valor de colMoto
    public function getColMoto(){
        return $this->colMoto;
    }

    //Obtiene el valor de colVenta
    public function getColVenta(){
        return $this->colVenta;
    }


    /******************* toString ********************/


    public function __toString(){
        $objCliente=$this->getColCliente();
        $objMoto=$this->getColMoto();
        $objVenta=$this->getColVenta();

        $msjToString = "\n\nDenominación de la empresa: ".$this->getDenominacion()."\nDirección de la empresa: ".$this->getDireccion()."\nClientes de la empresa: \n".$this->recorrerObjectos($objCliente)."\nMotos de la empresa: \n".$this->recorrerObjectos($objMoto)."\nVentas de la empresa: \n".$this->recorrerObjectos($objVenta)."\n\n";

        return $msjToString;
    }


    /***************** OTROS MÉTODOS *****************/


    /**
     * Su funcion es recorrer las colecciones de objetos
     * y concatenalo en un string
     * @param array $colObjetos
     * @return String
     */
    public function recorrerObjectos($colObjetos){
        $dato = "";
        for($i = 0; $i < count($colObjetos); $i++){
            $dato .= $colObjetos[$i]."\n";
        }
        return $dato;
    }


    /**
     * Recorre la colección de motos de la Empresa y retorna la referencia al objeto moto cuyo código coincide con el recibido por parámetro.
     * @param INT $codigoMoto
     * @return OBJ $objMoto
     */
    public function retornarMoto($codigoMoto){
        $colM = $this->getColMoto();

        // Inicializar $objMoto como null
        $objMoto = null;
    
        //Uso while porque corta cuando lo encuentra
        $encontro = false;
        $i = 0;
        while($i < count($colM) && !$encontro){
            if($codigoMoto == $colM[$i]->getCodigo()){
                $objMoto = $colM[$i];
                $encontro = true;
            }
            $i++;
        }
        return $objMoto;
    }

    
    /**
     * Recibe por parámetro una colección de códigos de motos, la cual es recorrida, y por cada elemento de la colección se busca el objeto moto correspondiente al código y se incorpora a la colección de motos de la instancia Venta que debe ser creada. 
     * Recordar que no todos los clientes ni todas las motos, están disponibles para registrar una venta en un momento determinado.
     * El método debe setear las variables instancias de venta que corresponda y retornar el importe final de la venta.
     * @param ARRAY $colCodigosMoto
     * @param OBJ $objCliente
     * @return FLOAT $importeFinal
     */
    public function registrarVenta($colCodigosMoto, $objCliente){
        //Inicializo variables
        $colV = $this->getColVenta();
        $estadoCliente = $objCliente->getBaja();
        $precioFinal = 0;

        if($estadoCliente){ //Si el cliente puede comprar
            $objVenta = new Venta(count($colV)+1, date ('y-m-d'), $objCliente);

            //Uso for porque se cuantos ciclos hace
            for($i = 0; $i < count($colCodigosMoto); $i++){
                $codigo = $colCodigosMoto[$i];
                $objMoto = $this->retornarMoto($codigo);

                if($objMoto != null){
                    $objVenta->incorporarMoto($objMoto);
                    $precioFinal = $objVenta->getPrecioFinal();
                }
            }
            $colV[] = $objVenta;
            $this->setColVenta($colV);
        }
        return $precioFinal;
    }


    /**
     * Recibe por parámetro el tipo y número de documento de un Cliente y retorna una colección con las ventas realizadas al cliente.
     * @param STRING $tipo
     * @param INT $numDoc
     * @return ARRAY $colVentasAlCliente
     */
    public function retornarVentasXCliente($tipo,$numDoc){
        $colV = $this->getColVenta();
        $i = 0;
        $encontro = false;
        $ventaRealizada = "";

        //Uso while porque corta cuando lo
        while($i < count($colV) && !$encontro){
            $venta = $colV[$i]->getObjCliente(); //Obtiene el cliente
            $tipoDNI = $venta->getTipoDNI(); //Obtiene datos del cliente
            $nroDNI = $venta->getNroDNI(); //Obtiene datos del cliente
            if($tipoDNI == $tipo && $numDoc == $nroDNI){
                $ventaRealizada = $colV[$i];
                $encontro = true;
            }
            $i++;
        }
        return $ventaRealizada;
    }
}
/*public function retornarVentasXCliente($tipo, $numDoc){
    $colV = $this->getColVenta();
    $colVentasAlCliente = [];

    // Recorrer todas las ventas
    foreach ($colV as $venta) {
        $cliente = $venta->getObjCliente(); //Obtiene el cliente de la venta
        if ($cliente->getTipoDNI() == $tipo && $cliente->getNroDNI() == $numDoc) {
            // Si el cliente coincide, añadir la venta a la colección
            $colVentasAlCliente[] = $venta;
        }
    }

    return $colVentasAlCliente;
}*/