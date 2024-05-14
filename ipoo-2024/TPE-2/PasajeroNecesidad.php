<?php
/*
La clase Pasajeros con necesidades especiales se refiere a pasajeros que pueden requerir servicios especiales como sillas de ruedas, asistencia para el embarque o desembarque, o comidas especiales para personas con alergias o restricciones alimentarias.

Si el pasajero tiene necesidades especiales y requiere silla de ruedas, asistencia y comida especial entonces el pasaje tiene un incremento del 30%; si solo requiere uno de los servicios prestados entonces el incremento es del 15%.
*/

//Creo la clase y sus atributos
class PasajeroNecesidad extends Pasajero{
    private $sillaRuedas;
    private $asistenciaEmbarque;
    private $alimento;

    //Creo la función constructora
    public function __construct($pnombre, $papellido, $pnroDNI, $ptelefono, $pnroAsiento, $pnroTicket, $psillaRuedas, $pasistenciaEmbarque, $palimento){
        parent:: __construct($pnombre, $papellido, $pnroDNI, $ptelefono, $pnroAsiento, $pnroTicket);
        $this->sillaRuedas = $psillaRuedas;
        $this->asistenciaEmbarque = $pasistenciaEmbarque;
        $this->alimento = $palimento;
    }


    /*************** MÉTODOS DE ACCESO ***************/
    /********************* SETERS ********************/


    //Setea el valor de sillaRuedas
    public function setSillaRuedas($sillaRuedas){
        $this->sillaRuedas = $sillaRuedas;
    }

    //Setea el valor de asistenciaEmbarque
    public function setAsistenciaEmbarque($asistenciaEmbarque){
        $this->asistenciaEmbarque = $asistenciaEmbarque;
    }

    //Setea el valor de alimento
    public function setAlimento($alimento){
        $this->alimento = $alimento;
    }


    /*************** MÉTODOS DE ACCESO ***************/
    /********************* GETERS ********************/


    //Obtiene el valor de sillaRuedas
    public function getSillaRuedas(){
        return $this->sillaRuedas;
    }

    //Obtiene el valor de asistenciaEmbarque
    public function getAsistenciaEmbarque(){
        return $this->asistenciaEmbarque;
    }

    //Obtiene el valor de alimento
    public function getAlimento(){
        return $this->alimento;
    }


    /******************* toString ********************/


    public function __toString(){
        $msjToString = parent:: __toString();
        $msjToString .= "\n\nSilla de ruedas: ".$this->getSillaRuedas()."\nAsistencia embarque/desembarque: ".$this->getAsistenciaEmbarque()."\nAsistencia alimentaria: ".$this->getAlimento()."\n\n";

        return $msjToString;
    }


    /***************** OTROS MÉTODOS *****************/


    /**
     * Implementar el método darPorcentajeIncremento() que retorne el porcentaje que debe aplicarse como incremento según las características del pasajero. 
     * @return FLOAT $porcentajeIncremento
     */
    public function darPorcentajeIncremento(){

        //3 necesidades
        if($this->getSillaRuedas() && $this->getAsistenciaEmbarque() && $this->getAlimento()){
            $porcentajeIncremento = parent:: darPorcentajeIncremento() + 20; //30% en total

        //1 y 2 necesidades
        }else{
            $porcentajeIncremento = parent:: darPorcentajeIncremento() + 5; //15% en total

        }
        return $porcentajeIncremento;
    }
}