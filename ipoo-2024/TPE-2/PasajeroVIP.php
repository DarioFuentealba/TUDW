<?php
/*
Para un pasajero VIP se incrementa el importe un 35% y si la cantidad de millas acumuladas supera a las 300 millas se realiza un incremento del 30%. 
*/

//Creo la clase y sus atributos
class PasajeroVIP extends Pasajero{
    private $nroViajeroFrecuente;
    private $cantMillas;

    //Creo la función constructora
    public function __construct($pnombre, $papellido, $pnroDNI, $ptelefono, $pnroAsiento, $pnroTicket, $pnroViajeroFrecuente, $pcantMillas){
        parent:: __construct($pnombre, $papellido, $pnroDNI, $ptelefono, $pnroAsiento, $pnroTicket);
        $this->nroViajeroFrecuente = $pnroViajeroFrecuente;
        $this->cantMillas = $pcantMillas;
    }


    /*************** MÉTODOS DE ACCESO ***************/
    /********************* SETERS ********************/


    //Setea el valor de nroViajeroFrecuente
    public function setNroViajeroFrecuente($nroViajeroFrecuente){
        $this->nroViajeroFrecuente = $nroViajeroFrecuente;
    }

    //Setea el valor de cantMillas
    public function setCantMillas($cantMillas){
        $this->cantMillas = $cantMillas;
    }


    /*************** MÉTODOS DE ACCESO ***************/
    /********************* GETERS ********************/


    //Obtiene el valor de nroViajeroFrecuente
    public function getNroViajeroFrecuente(){
        return $this->nroViajeroFrecuente;
    }

    //Obtiene el valor de cantMillas
    public function getCantMillas(){
        return $this->cantMillas;
    }


    /******************* toString ********************/


    public function __toString(){
        $msjToString = "\n\nNúmero de viajero frecuente: ".$this->getNroViajeroFrecuente()."\nCantidad de millas: ".$this->getcantMillas()."\n\n";

        return $msjToString;
    }


    /***************** OTROS MÉTODOS *****************/


    /**
     * Implementar el método darPorcentajeIncremento() que retorne el porcentaje que debe aplicarse como incremento según las características del pasajero. 
     * @return FLOAT $porcentajeIncremento
     */
    public function darPorcentajeIncremento(){
        if($this->getCantMillas() <= 300){
            $porcentajeIncremento = parent:: darPorcentajeIncremento() + 25; //35% en total

        }else{
            $porcentajeIncremento = parent:: darPorcentajeIncremento() + 20; //30% en total

        }
        return $porcentajeIncremento;
    }
}