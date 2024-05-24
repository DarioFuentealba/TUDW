<?php

//Creo la clase y sus atributos
class PartidoFutbol extends Partido{
    private $cofMenores;
    private $coefJuveniles;
    private $coefMayores;

    //Creo la función constructora
    public function __construct($idpartido, $fecha, $objEquipo1, $cantGolesE1, $objEquipo2, $cantGolesE2){
        parent:: __construct($idpartido, $fecha,$objEquipo1, $cantGolesE1, $objEquipo2, $cantGolesE2);
        $this->cofMenores = 0.13;
        $this->coefJuveniles = 0.19;
        $this->coefMayores = 0.27;
    }


    /*************** MÉTODOS DE ACCESO ***************/
    /********************* SETERS ********************/


    //Setea el valor de cofMenores
    public function setCofMenores($cofMenores){
        $this->cofMenores = $cofMenores;
    }

    //Setea el valor de coefJuveniles
    public function setCoefJuveniles($coefJuveniles){
        $this->coefJuveniles = $coefJuveniles;
    }

    //Setea el valor de coefMayores
    public function setCoefMayores($coefMayores){
        $this->coefMayores = $coefMayores;
    }


    /*************** MÉTODOS DE ACCESO ***************/
    /********************* GETERS ********************/


    //Obtiene el valor de cofMenores
    public function getCofMenores(){
        return $this->cofMenores;
    }

    //Obtiene el valor de coefJuveniles
    public function getCoefJuveniles(){
        return $this->coefJuveniles;
    }

    //Obtiene el valor de coefMayores
    public function getCoefMayores(){
        return $this->coefMayores;
    }


    /******************* toString ********************/


    public function __toString(){
        $msjToString = parent:: __toString();
        $msjToString .= "\n\nCoeficiente de menores: ".$this->getCofMenores()."\nCoeficiente de juveniles: ".$this->getCoefJuveniles()."\nCoeficiente de mayores: ".$this->getCoefMayores()."\n\n";

        return $msjToString;
    }


    /***************** OTROS MÉTODOS *****************/




    /**
     * 5. Implementar el método coeficientePartido() en la clase Partido el cual retorna el valor obtenido por el coeficiente base, multiplicado por la cantidad de goles y la cantidad de jugadores.
     * Redefinir dicho método según corresponda.
     * @return FLOAT $coefPartido
     */
    public function coeficientePartido(){
        if($this->getObjEquipo1()->getObjCategoria()->getDescripcion() == "Menores" && $this->getObjEquipo2()->getObjCategoria()->getDescripcion() == "Menores"){
            $coefPartido = (parent:: coeficientePartido() / $this->getCoefBase()) * $this->getCofMenores();        
        }elseif($this->getObjEquipo1()->getObjCategoria()->getDescripcion() == "Menores" && $this->getObjEquipo2()->getObjCategoria()->getDescripcion() == "juveniles"){
            $coefPartido = (parent:: coeficientePartido() / $this->getCoefBase()) * $this->getCoefJuveniles();        
        }else{
            $coefPartido = (parent:: coeficientePartido() / $this->getCoefBase()) * $this->getCoefMayores();        
        }
        return $coefPartido;
    }
}
