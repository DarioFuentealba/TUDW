<?php
/*
1. Implementar la clase Torneo que contiene la colección de partidos y un importe que será parte del
premio. Cuando un Torneo es creado la colección de partidos debe ser creada como una colección vacía.

4. Implementar el método ingresarPartido($OBJEquipo1, $OBJEquipo2, $fecha, $tipoPartido) en la
clase Torneo el cual recibe por parámetro 2 equipos, la fecha en la que se realizará el partido y si se
trata de un partido de futbol o basquetbol . El método debe crear y retornar la instancia de la clase
Partido que corresponda y almacenarla en la colección de partidos del Torneo. Se debe chequear que los
2 equipos tengan la misma categoría e igual cantidad de jugadores, caso contrario no podrá ser
registrado ese partido en el torneo.

6. Implementar el método darGanadores($deporte) en la clase Torneo que recibe por parámetro si se
trata de un partido de fútbol o de básquetbol y en base al parámetro busca entre esos partidos los
equipos ganadores ( equipo con mayor cantidad de goles). El método retorna una colección con los
objetos de los equipos encontrados.

*/

//Creo la clase y sus atributos
class Torneo{
    private $colObjPartido;
    private $premio;

    //Creo la función constructora
    public function __construct($pcolObjPartido, $ppremio){
        $this->colObjPartido = $pcolObjPartido;
        $this->premio = $ppremio;
    }


    /*************** MÉTODOS DE ACCESO ***************/
    /********************* SETERS ********************/


    //Setea el valor de colObjPartido
    public function setColObjPartido($colObjPartido){
        $this->colObjPartido = $colObjPartido;
    }

    //Setea el valor de premio
    public function setPremio($premio){
        $this->premio = $premio;
    }


    /*************** MÉTODOS DE ACCESO ***************/
    /********************* GETERS ********************/


    //Obtiene el valor de colObjPartido
    public function getColObjPartido(){
        return $this->colObjPartido;
    }

    //Obtiene el valor de premio
    public function getPremio(){
        return $this->premio;
    }


    /******************* toString ********************/


    public function __toString(){
        $msjToString = "\n\nDatos de los partido: ".$this->getColObjPartido()."\nPremio: $".$this->getPremio()."\n\n";

        return $msjToString;
    }


    /***************** OTROS MÉTODOS *****************/


    /**
     * Mostrar datos de los partidos
     * @return STRING $cadena
     */
    public function datosPartido(){
        $colP = $this->getColObjPartido();
        $cadena = "";

        //Uso for porque se cuantos ciclos hara
        for($i = 0; $i < count($colP); $i++){
            $cadena .= $colP[$i]."\n---------------\n";
        }
        return $cadena;
    }


    /**
     * 4. Implementar el método ingresarPartido($OBJEquipo1, $OBJEquipo2, $fecha, $tipoPartido) en la clase Torneo el cual recibe por parámetro 2 equipos, la fecha en la que se realizará el partido y si se trata de un partido de futbol o basquetbol . El método debe crear y retornar la instancia de la clase Partido que corresponda y almacenarla en la colección de partidos del Torneo. Se debe chequear que los 2 equipos tengan la misma categoría e igual cantidad de jugadores, caso contrario no podrá ser registrado ese partido en el torneo.
     * @param OBJ $objEquipo1
     * @param OBJ $objEquipo2
     * @param STRING $fecha
     * @param OBJ $tipoPartido
     */
    public function ingresarPartido($objEquipo1, $objEquipo2, $fecha, $tipoPartido){
        //verifico que ambos equipos tengan la misma categoria e igual cantidad de jugadores
        if($objEquipo1->getCantJugadores() == $objEquipo2->getCantJugadores() && $objEquipo1->getObjCategoria() == $objEquipo2->getObjCategoria()){

            //Si es un partido de futbol
            if($tipoPartido instanceof PartidoFutbol){
                //Tomo el último valor de idPartido asignado y lo aumento en 1 para ponerle a este partido sin repetir el N° de id
                $ultimoIdPartidoAsignado = count($this->getColObjPartido()) + 1;

                //Creo el objeto PartidoFutbol
                //Sus atributos son los siguientes ($idpartido, $fecha, $objEquipo1, $cantGolesE1, $objEquipo2, $cantGolesE2)
                $objPartidoFutbol = new PartidoFutbol($ultimoIdPartidoAsignado, $fecha, $objEquipo1, 0, $objEquipo2, 0); //$cantGolesE1 y $cantGolesE2 valen 0 porque al comenzar el partido van 0 a 0

                $colP = $this->getColObjPartido();
                array_push($colP,$objPartidoFutbol);
                $this->setColObjPartido($colP);
    
                $ultimoIdPartidoAsignado = $ultimoIdPartidoAsignado + 1;
                $tipoPartido->setidpartido($ultimoIdPartidoAsignado);
    
            }else{
                //Tomo el último valor de idPartido asignado y lo aumento en 1 para ponerle a este partido sin repetir el N° de id
                $ultimoIdPartidoAsignado = count($this->getColObjPartido()) + 1;

                //Creo el objeto PartidoBasquet
                //Sus atributos son los siguientes ($idpartido, $fecha,$objEquipo1, $cantGolesE1, $objEquipo2, $cantGolesE2, $pcantInfraccione)
                $objPartidoBasquet = new PartidoBasquet($ultimoIdPartidoAsignado, $fecha, $objEquipo1, 0, $objEquipo2, 0, 0); //$cantGolesE1, $cantGolesE2 y pcantInfraccione valen 0 porque al comenzar el partido van 0 a 0 y no hay infracciones

                $colP = $this->getColObjPartido();
                array_push($colP,$objPartidoBasquet);
                $this->setColObjPartido($colP);
    
                $ultimoIdPartidoAsignado = $ultimoIdPartidoAsignado + 1;
                $tipoPartido->setidpartido($ultimoIdPartidoAsignado);

            }
        }
    }


    /**
     * 6. Implementar el método darGanadores($deporte) en la clase Torneo que recibe por parámetro si se trata de un partido de fútbol o de básquetbol y en base al parámetro busca entre esos partidos los equipos ganadores ( equipo con mayor cantidad de goles). El método retorna una colección con los objetos de los equipos encontrados.
     * @param STRING $deporte
     * @return ARRAY $arrayEquiposGanadores
     */
    public function darGanadores($deporte){
        $colP = $this->getColObjPartido();
        $arrayEquiposGanadores = [];

        for($i = 0; $i < count($colP); $i++){
            if($deporte instanceof PartidoFutbol){ //Si son partidos de futbol
                    array_push($arrayEquiposGanadores, $colP[$i]->darEquipoGanador());

            }else{ //Si son partido de basquet
                $colP[$i]->darEquipoGanador();
                    array_push($arrayEquiposGanadores, $colP[$i]->darEquipoGanador());
            }
        }
        return $arrayEquiposGanadores;
    }
}