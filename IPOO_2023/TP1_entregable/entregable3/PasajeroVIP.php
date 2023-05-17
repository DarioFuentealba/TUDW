<?php

/*
La empresa de transporte desea gestionar la información correspondiente a los pasajeros de los Viajes que pueden ser: Pasajeros estándares, Pasajeros VIP y Pasajeros con necesidades especiales. 

La clase Pasajero tiene como atributos el nombre, el número de asiento y el número de ticket del pasaje del viaje. La clase "PasajeroVIP" tiene como atributos adicionales el número de viajero frecuente y cantidad de millas de pasajero. La clase Pasajeros con necesidades especiales se refiere a pasajeros que pueden requerir servicios especiales como sillas de ruedas, asistencia para el embarque o desembarque, o comidas especiales para personas con alergias o restricciones alimentarias.  Implementar el método darPorcentajeIncremento() que retorne el porcentaje que debe aplicarse como incremento según las características del pasajero. Para un pasajero VIP se incrementa el importe un 35% y si la cantidad de millas acumuladas supera a las 300 millas se realiza un incremento del 30%. Si el pasajero tiene necesidades especiales y requiere silla de ruedas, asistencia y comida especial entonces el pasaje tiene un incremento del 30%; si solo requiere uno de los servicios prestados entonces el incremento es del 15%. Por último, para los pasajeros comunes el porcentaje de incremento es del 10 %.


Modificar la clase viaje para almacenar el costo del viaje, la suma de los costos abonados por los pasajeros e implementar el método venderPasaje($objPasajero) que debe incorporar el pasajero a la colección de pasajeros ( solo si hay espacio disponible), actualizar los costos abonados y retornar el costo final que deberá ser abonado por el pasajero.


Implemente la función hayPasajesDisponible() que retorna verdadero si la cantidad de pasajeros del viaje es menor a la cantidad máxima de pasajeros y falso caso contrario
*/

class PasajeroVIP extends Pasajero{
 private $nroViajeroFrec;
 private $cantMillas;


    public function __construct($pnombre, $papellido, $pnroDoc, $ptelefono, $pnroAsiento, $pnroTicket, $pnroViajeroFrec, $pcantMillas){
        parent:: __construct($pnombre, $papellido, $pnroDoc, $ptelefono, $pnroAsiento, $pnroTicket);
        $this->nroViajeroFrec = $pnroViajeroFrec;
        $this->cantMillas = $pcantMillas;
    }


    /*************************************************/
    /*************** MÉTODOS DE ACCESO ***************/
    /********************* SETERS ********************/
    /*************************************************/

    /**
     * Setea el valor de nroViajeroFrec
     * @param $nroViajeroFrec
     */
    public function setNroViajeroFrec($nroViajeroFrec){
        $this->nroViajeroFrec = $nroViajeroFrec;
    }

    /**
     * Setea el valor de cantMillas
     * @param $cantMillas
     */
    public function setCantMillas($cantMillas){
        $this->cantMillas = $cantMillas;
    }

    /*************************************************/
    /*************** MÉTODOS DE ACCESO ***************/
    /********************* GETERS ********************/
    /*************************************************/

    /**
     * Obtiene el valor de nroViajeroFrec
     */
    public function getNroViajeroFrec(){
        return $this->nroViajeroFrec;
    }

    /**
     * Obtiene el valor de cantMillas
     */
    public function getCantMillas(){
        return $this->cantMillas;
    }

    /*************************************************/
    /******************* toString ********************/
    /*************************************************/
    public function __toString(){
        $msjToString = parent::__toString();
        $msjToString = "\n".$msjToString."\nEl número de viajero frecuente es: ".$this->getNroViajeroFrec()."\nLa cantidad de millas es: ".$this->getCantMillas()."\n\n";
        return $msjToString;
    }


    /*************************************************/
    /***************** OTROS MÉTODOS *****************/
    /*************************************************/

    /**
     * Incrementa el monto del pasaje y retorna el porcentaje que debe aplicarse como incremento según las características del pasajero.
     * Para un pasajero VIP se incrementa el importe un 35% y si la cantidad de millas acumuladas supera a las 300 millas se realiza un incremento del 30%
     * @return INT
     */
    public function darPorcentajeIncremento(){
        //Invoco datos a utilizar
        $cantMillas = $this->getCantMillas();

        if($cantMillas <= 300){
            $porcentajeAumento = 35;
        }else{
            $porcentajeAumento = 30;
        }
        /*
        //Recorrido exaustivo
        for($i = 0; $i < $cant; $i++){ //ventas
            $pasajero = $colP[$i];

            
        }*/
        return $porcentajeAumento;
    }
}
