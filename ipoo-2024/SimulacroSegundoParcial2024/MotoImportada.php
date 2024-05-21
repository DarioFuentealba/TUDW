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

    Para el caso de las motos importadas, se debe almacenar el país desde el que se importa y el importe correspondiente a los impuestos de importación que la empresa paga por el ingreso al país.
*/

//Creo la clase y sus atributos
class MotoImportada extends Moto{
    private $paisOrigen;
    private $impuesto;

    //Creo la función constructora
    public function __construct($pcodigo, $pcosto, $panioFabricacion, $pdescripcion, $pporcentajeIncrementoAnual, $pactiva, $ppaisOrigen,$pimpuesto){
        parent:: __construct($pcodigo, $pcosto, $panioFabricacion, $pdescripcion, $pporcentajeIncrementoAnual, $pactiva);
        $this->paisOrigen = $ppaisOrigen;
        $this->impuesto = $pimpuesto;
    }


    /*************** MÉTODOS DE ACCESO ***************/
    /********************* SETERS ********************/


    //Setea el valor de paisOrigen
    public function setPaisOrigen($paisOrigen){
        $this->paisOrigen = $paisOrigen;
    }

    //Setea el valor de impuesto
    public function setImpuesto($impuesto){
        $this->impuesto = $impuesto;
    }


    /*************** MÉTODOS DE ACCESO ***************/
    /********************* GETERS ********************/


    //Obtiene el valor de paisOrigen
    public function getPaisOrigen(){
        return $this->paisOrigen;
    }

    //Obtiene el valor de impuesto
    public function getImpuesto(){
        return $this->impuesto;
    }


    /******************* toString ********************/


    public function __toString(){
        $msjToString = parent:: __toString();
        $msjToString .= "\n\nPaís de origen TSMI: ".$this->getPaisOrigen()."\nImpuesto TSMI: $".$this->getImpuesto()."\n\n";

        return $msjToString;
    }


    /***************** OTROS MÉTODOS *****************/


    /**
     * Redefinir el método darPrecioVenta para que en el caso de las motos nacionales aplique el porcentaje de descuento sobre el valor calculado inicialmente. Para el caso de las motos importadas, al valor calculado se debe sumar el impuesto que pagó la empresa por su importación.
     *darPrecioVenta el cual calcula el valor por el cual puede ser vendida una moto.
     *  @return FLOAT $precioVenta
     */
    public function darPrecioVenta(){
        $precioVenta = parent:: darPrecioVenta() + $this->getImpuesto();
        return $precioVenta;
    }
}