<?php

//Creo la clase y sus atributos
class PartidoBasquet extends Partido{
    private $cantInfraccione;
    private $coefPenalizacion;

    //Creo la función constructora
    public function __construct($idpartido, $fecha,$objEquipo1, $cantGolesE1, $objEquipo2, $cantGolesE2, $pcantInfraccione){
        parent:: __construct($idpartido, $fecha,$objEquipo1, $cantGolesE1, $objEquipo2, $cantGolesE2);

        $this->cantInfraccione = $pcantInfraccione;
        $this->coefPenalizacion = 0.75;
    }


    /*************** MÉTODOS DE ACCESO ***************/
    /********************* SETERS ********************/


    //Setea el valor de cantInfraccione
    public function setCantInfraccione($cantInfraccione){
        $this->cantInfraccione = $cantInfraccione;
    }

    //Setea el valor de coefPenalizacion
    public function setCoefPenalizacion($coefPenalizacion){
        $this->coefPenalizacion = $coefPenalizacion;
    }


    /*************** MÉTODOS DE ACCESO ***************/
    /********************* GETERS ********************/


    //Obtiene el valor de cantInfraccione
    public function getCantInfraccione(){
        return $this->cantInfraccione;
    }

    //Obtiene el valor de coefPenalizacion
    public function getCoefPenalizacion(){
        return $this->coefPenalizacion;
    }

    /******************* toString ********************/


    public function __toString(){
        $msjToString = parent:: __toString();
        $msjToString = "\n\nCantidad de infracciones: ".$this->getCantInfraccione()."\nCoeficiente de penalización: ".$this->getCoefPenalizacion()."\n\n";

        return $msjToString;
    }


    /***************** OTROS MÉTODOS *****************/


    /**
     * 5. Implementar el método coeficientePartido() en la clase Partido el cual retorna el valor obtenido por el coeficiente base, multiplicado por la cantidad de goles y la cantidad de jugadores.
     * Redefinir dicho método según corresponda.
     * @return FLOAT $coefPartido
     */
    public function coeficientePartido(){
        $coefPartido = ((parent:: coeficientePartido() / ($this->getCantGolesE1() + $this->getCantGolesE2())) / ($this->getObjEquipo1()->getCantJugadores() + $this->getObjEquipo2()->getCantJugadores())) - ($this->getCoefPenalizacion() * $this->getCantInfraccione());        
        return $coefPartido;
    }
}