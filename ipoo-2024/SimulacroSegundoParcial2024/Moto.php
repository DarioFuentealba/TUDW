<?php
/*
En la clase Moto:
1. Se registra la siguiente información: código, costo, año fabricación, descripción, porcentaje incremento anual, activa (atributo que va a contener un valor true, si la moto está disponible para la venta y false en caso contrario).
2. Método constructor que recibe como parámetros los valores iniciales para los atributos definidos en la clase.
3. Los métodos de acceso de cada uno de los atributos de la clase.
4. Redefinir el método toString para que retorne la información de los atributos de la clase.
5. Implementar el método darPrecioVenta el cual calcula el valor por el cual puede ser vendida una moto.
Si la moto no se encuentra disponible para la venta retorna un valor < 0. Si la moto está disponible para la venta, el método realiza el siguiente cálculo:
    $_venta = $_compra + $_compra * (anio * por_inc_anual)
    donde $_compra: es el costo de la moto.
    anio: cantidad de años transcurridos desde que se fabricó la moto.
    por_inc_anual: porcentaje de incremento anual de la moto.

    ? 2do Parcial

1. Implementar la jerarquía de herencia que corresponda para implementar las motos Nacionales e Importadas.

2. Incorporar los atributos que se requieren para el nuevo requerimiento de la empresa.

3. Redefinir el método toString para que retorne la información de los atributos de la clase.

4. Redefinir el método darPrecioVenta para que en el caso de las motos nacionales aplique el porcentaje de descuento sobre el valor calculado inicialmente. Para el caso de las motos importadas, al valor calculado se debe sumar el impuesto que pagó la empresa por su importación. A continuación se describe el método darPrecioVenta con el objetivo de tener presente su implementación y realizar las modificaciones que crea necesarias para dar soporte al nuevo requerimiento.
===================================================================================
.: Recordar :. el método darPrecioVenta inicialmente calculaba el valor por el cual puede ser vendida una moto. Si
la moto no se encuentra disponible para la venta retorna un valor < 0. Si la moto está disponible para la venta, el
método realiza el siguiente cálculo:
$_venta = $_compra + $_compra * (anio * por_inc_anual)
donde $_compra: es el costo de la moto.
anio: cantidad de años transcurridos desde que se fabricó la moto.
por_inc_anual: porcentaje de incremento anual de la moto.
*/

//Creo la clase y sus atributos
class Moto{
    private $codigo;
    private $costo;
    private $anioFabricacion;
    private $descripcion;
    private $porcentajeIncrementoAnual;
    private $activa;

    //Creo la función constructora
    public function __construct($pcodigo, $pcosto, $panioFabricacion, $pdescripcion, $pporcentajeIncrementoAnual, $pactiva){
        $this->codigo = $pcodigo;
        $this->costo = $pcosto;
        $this->anioFabricacion = $panioFabricacion;
        $this->descripcion = $pdescripcion;
        $this->porcentajeIncrementoAnual = $pporcentajeIncrementoAnual;
        $this->activa = $pactiva;
    }


    /*************** MÉTODOS DE ACCESO ***************/
    /********************* SETERS ********************/


    //Setea el valor de codigo
    public function setCodigo($codigo){
        $this->codigo = $codigo;
    }

    //Setea el valor de costo
    public function setCosto($costo){
        $this->costo = $costo;
    }

    //Setea el valor de anioFabricacion
    public function setAnioFabricacion($anioFabricacion){
        $this->anioFabricacion = $anioFabricacion;
    }

    //Setea el valor de descripcion
    public function setDescripcion($descripcion){
        $this->descripcion = $descripcion;
    }

    //Setea el valor de porcentajeIncrementoAnual
    public function setPorcentajeIncrementoAnual($porcentajeIncrementoAnual){
        $this->porcentajeIncrementoAnual = $porcentajeIncrementoAnual;
    }

    //Setea el valor de activa
    public function setActiva($activa){
        $this->activa = $activa;
    }


    /*************** MÉTODOS DE ACCESO ***************/
    /********************* GETERS ********************/


    //Obtiene el valor de codigo
    public function getCodigo(){
        return $this->codigo;
    }

    //Obtiene el valor de costo
    public function getCosto(){
        return $this->costo;
    }

    //Obtiene el valor de anioFabricacion
    public function getAnioFabricacion(){
        return $this->anioFabricacion;
    }

    //Obtiene el valor de descripcion
    public function getDescripcion(){
        return $this->descripcion;
    }

    //Obtiene el valor de porcentajeIncrementoAnual
    public function getPorcentajeIncrementoAnual(){
        return $this->porcentajeIncrementoAnual;
    }

    //Obtiene el valor de activa
    public function getActiva(){
        return $this->activa;
    }


    /******************* toString ********************/


    public function __toString(){
        $msjToString = "\n\nCódigo de la moto TSM: ".$this->getCodigo()."\nCosto de la moto TSM: ".$this->getCosto()."\nAño de fabricación de la moto TSM: ".$this->getAnioFabricacion()."\nDescripción de la moto TSM: ".$this->getDescripcion()."\nPorcentaje de incremento anual TSM: $".$this->getPorcentajeIncrementoAnual()."\n¿Moto activa? TSM: ".$this->estadoMoto()."\n\n";

        return $msjToString;
    }


    /***************** OTROS MÉTODOS *****************/


    /**
     * Esta funcion lo unico que hace es evaluar el estado de la moto y retornar una cadena de caracteres
     * @return STRING $estado
     */
    public function estadoMoto(){
        $estado=$this->getActiva();
        return $estado?"Disponible para la venta":"No disponible para la venta";
    }


    /**
     * Redefinir el método darPrecioVenta para que en el caso de las motos nacionales aplique el porcentaje de descuento sobre el valor calculado inicialmente. Para el caso de las motos importadas, al valor calculado se debe sumar el impuesto que pagó la empresa por su importación.
     *darPrecioVenta el cual calcula el valor por el cual puede ser vendida una moto.
     *Si la moto no se encuentra disponible para la venta retorna un valor < 0. Si la moto está disponible para la venta, el método realiza el siguiente cálculo:
     *$_venta = $_compra + $_compra * (anio * por_inc_anual)
     *donde $_compra: es el costo de la moto.
     *anio: cantidad de años transcurridos desde que se fabricó la moto.
     *por_inc_anual: porcentaje de incremento anual de la moto.
    
     *date("Y") me da el año actual
     *  @return FLOAT $precioVenta
     */
    public function darPrecioVenta(){
        if($this->getActiva()){
            $aniosDesdeQueSeFabrico = date("Y") - $this->getAnioFabricacion();
            $precioVenta = $this->getCosto() + $this->getCosto() * ($aniosDesdeQueSeFabrico * $this->getPorcentajeIncrementoAnual());
        }else{
            $precioVenta = -1;
        }
        return $precioVenta;
    }
}