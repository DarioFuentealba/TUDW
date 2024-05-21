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

    Con el objetivo de incentivar el consumo de productos Nacionales, se desea almacenar un porcentaje de descuento en las motos Nacionales que será aplicado al momento de la venta (por defecto el valor del descuento es del 15%).
*/

//Creo la clase y sus atributos
class MotoNacional extends Moto{
    private $porcentajeDescuento;

    //Creo la función constructora
    public function __construct($pcodigo, $pcosto, $panioFabricacion, $pdescripcion, $pporcentajeIncrementoAnual, $pactiva){
        parent:: __construct($pcodigo, $pcosto, $panioFabricacion, $pdescripcion, $pporcentajeIncrementoAnual, $pactiva);
        $this->porcentajeDescuento = 15;
    }


    /*************** MÉTODOS DE ACCESO ***************/
    /********************* SETERS ********************/


    //Setea el valor de porcentajeDescuento
    public function setPorcentajeDescuento($porcentajeDescuento){
        $this->porcentajeDescuento = $porcentajeDescuento;
    }


    /*************** MÉTODOS DE ACCESO ***************/
    /********************* GETERS ********************/


    //Obtiene el valor de porcentajeDescuento
    public function getPorcentajeDescuento(){
        return $this->porcentajeDescuento;
    }


    /******************* toString ********************/


    public function __toString(){
        $msjToString = parent:: __toString();
        $msjToString .= "\n\nPorcentaje de descuento TSMN: ".$this->getPorcentajeDescuento()."%\n\n";

        return $msjToString;
    }


    /***************** OTROS MÉTODOS *****************/


    /**
     * Redefinir el método darPrecioVenta para que en el caso de las motos nacionales aplique el porcentaje de descuento sobre el valor calculado inicialmente. Para el caso de las motos importadas, al valor calculado se debe sumar el impuesto que pagó la empresa por su importación.
     *darPrecioVenta el cual calcula el valor por el cual puede ser vendida una moto.
     *  @return FLOAT $precioVenta
     */
    public function darPrecioVenta(){
        $precioVenta = parent:: darPrecioVenta() - parent:: darPrecioVenta() * ($this->getPorcentajeDescuento() / 100);
        return $precioVenta;
    }
}