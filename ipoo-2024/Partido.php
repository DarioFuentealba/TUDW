<?php
/*
2. Implementar la jerarquía de herencia que crea necesaria para modelar los Partidos.

3. Implementar en la clase Partido el método darEquipoGanador() que retorna el equipo ganador de un
partido (equipo con mayor cantidad de goles del partido), en caso de empate debe retornar a los dos
equipos.

5. Implementar el método coeficientePartido() en la clase Partido el cual retorna el valor obtenido por el
coeficiente base, multiplicado por la cantidad de goles y la cantidad de jugadores. Redefinir dicho
método según corresponda.

7. Implementar el método calcularPremioPartido($OBJPartido) que debe retornar un arreglo asociativo
donde una de sus claves es ‘equipoGanador’ y contiene la referencia al equipo ganador; y la otra clave
es ‘premioPartido’ que contiene el valor obtenido del coeficiente del Partido por el importe configurado
para el torneo.
(premioPartido = Coef_partido * ImportePremio)

*/

class Partido{
    private $idpartido;
    private $fecha;
    private $objEquipo1;
    private $cantGolesE1;
    private $objEquipo2;
    private $cantGolesE2;
    private $coefBase;

    //CONSTRUCTOR
    public function __construct($idpartido, $fecha,$objEquipo1,$cantGolesE1,$objEquipo2,$cantGolesE2){
            $this->idpartido = $idpartido;
            $this->fecha = $fecha;
            $this->objEquipo1 =$objEquipo1;
            $this->cantGolesE1 = $cantGolesE1;
            $this->objEquipo2 = $objEquipo2;
            $this->cantGolesE2 = $cantGolesE2;
            $this->coefBase = 0.5;


    }

    //OBSERVADORES
    public function setidpartido($idpartido){
        $this->idpartido= $idpartido;
    }

    public function getIdpartido(){
        return $this->idpartido;
    }

    public function setFecha($fecha){
        $this->fecha= $fecha;
    }

    public function getFecha(){
        return $this->fecha;
    }


    public function setCantGolesE1($cantGolesE1){
        $this->cantGolesE1= $cantGolesE1;
    }

    public function getCantGolesE1(){
        return $this->cantGolesE1;
    }
    public function setCantGolesE2($cantGolesE2){
        $this->cantGolesE2= $cantGolesE2;
    }

    public function getCantGolesE2(){
        return $this->cantGolesE2;
    }



    public function setObjEquipo1($objEquipo1){
        $this->objEquipo1= $objEquipo1;
    }
    public function getObjEquipo1(){
        return $this->objEquipo1;
    }


    public function setObjEquipo2($objEquipo2){
        $this->objEquipo2= $objEquipo2;
    }
    public function getObjEquipo2(){
        return $this->objEquipo2;
    }




    public function setCoefBase($coefBase){
        $this->coefBase = $coefBase;
    }
    public function getCoefBase(){
        return $this->coefBase;
    }



public function __toString(){
        //string $cadena
        $cadena = "idpartido: ".$this->getIdpartido()."\n";
        $cadena = $cadena. "Fecha: ".$this->getFecha()."\n";
        $cadena = $cadena."\n"."--------------------------------------------------------"."\n";
        $cadena = $cadena. "<Equipo 1> "."\n".$this->getObjEquipo1()."\n";
        $cadena = $cadena. "Cantidad Goles E1: ".$this->getCantGolesE1()."\n";
        $cadena = $cadena. "\n"."--------------------------------------------------------"."\n";
        $cadena = $cadena. "\n"."--------------------------------------------------------"."\n";
        $cadena = $cadena. "<Equipo 2> "."\n".$this->getObjEquipo2()."\n";
        $cadena = $cadena. "Cantidad Goles E2: ".$this->getCantGolesE2()."\n";
        $cadena = $cadena. "\n"."--------------------------------------------------------"."\n";
        return $cadena;
    }


    /***************** OTROS MÉTODOS *****************/


    /**
     * 3. Implementar en la clase Partido el método darEquipoGanador() que retorna el equipo ganador de un partido (equipo con mayor cantidad de goles del partido), en caso de empate debe retornar a los dos equipos.
     * @return ARRAY $arrayEquipoGanador
     */
    public function darEquipoGanador(){
        //Inicializo variables
        $arrayEquipoGanador = [];

        if($this->getCantGolesE1() > $this->getCantGolesE2()){ //Si el equipo 1 marca mas goles que el equipo 2
            array_push($arrayEquipoGanador, $this->getObjEquipo1());

        }elseif($this->getCantGolesE1() < $this->getCantGolesE2()){ //Si el equipo 2 marca mas goles que el equipo 1
            array_push($arrayEquipoGanador, $this->getObjEquipo2());

        }else{ //Si ambos equipos marcan la misma cantidad de goles (Empate)
            array_push($arrayEquipoGanador, $this->getObjEquipo1(), $this->getObjEquipo2());
        }
        return $arrayEquipoGanador;
    }


    /**
     * 5. Implementar el método coeficientePartido() en la clase Partido el cual retorna el valor obtenido por el coeficiente base, multiplicado por la cantidad de goles y la cantidad de jugadores.
     * Redefinir dicho método según corresponda.
     * @return FLOAT $coefPartido
     */
    public function coeficientePartido(){
        //Calculo la cantidad de goles del partido
        $cantidadGoles = $this->getCantGolesE1() + $this->getCantGolesE2();

        //Calculo la cantidad de jugadores del partido
        $cantJugadores = $this->getObjEquipo1()->getCantJugadores() + $this->getObjEquipo2()->getCantJugadores();

        //Calculo el coeficiente del partido
        $coefPartido = $this->getCoefBase() * $cantidadGoles * $cantJugadores;
        
        return $coefPartido;
    }


    /**
     * 7. Implementar el método calcularPremioPartido($OBJPartido) que debe retornar un arreglo asociativo donde una de sus claves es ‘equipoGanador’ y contiene la referencia al equipo ganador; y la otra clave es ‘premioPartido’ que contiene el valor obtenido del coeficiente del Partido por el importe configurado para el torneo.
     * (premioPartido = Coef_partido * ImportePremio)
     * @param OBJ $objPartido
     * @return ARRAY $arrayEquipoGanador
     */
    public function calcularPremioPartido($objPartido){

    }
}
?>