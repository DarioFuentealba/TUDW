<?php

/*
La empresa de transporte desea gestionar la información correspondiente a los pasajeros de los Viajes que pueden ser: Pasajeros estándares, Pasajeros VIP y Pasajeros con necesidades especiales. 

La clase Pasajero tiene como atributos el nombre, el número de asiento y el número de ticket del pasaje del viaje. La clase "PasajeroVIP" tiene como atributos adicionales el número de viajero frecuente y cantidad de millas de pasajero. La clase Pasajeros con necesidades especiales se refiere a pasajeros que pueden requerir servicios especiales como sillas de ruedas, asistencia para el embarque o desembarque, o comidas especiales para personas con alergias o restricciones alimentarias.  Implementar el método darPorcentajeIncremento() que retorne el porcentaje que debe aplicarse como incremento según las características del pasajero. Para un pasajero VIP se incrementa el importe un 35% y si la cantidad de millas acumuladas supera a las 300 millas se realiza un incremento del 30%. Si el pasajero tiene necesidades especiales y requiere silla de ruedas, asistencia y comida especial entonces el pasaje tiene un incremento del 30%; si solo requiere uno de los servicios prestados entonces el incremento es del 15%. Por último, para los pasajeros comunes el porcentaje de incremento es del 10 %.


Modificar la clase viaje para almacenar el costo del viaje, la suma de los costos abonados por los pasajeros e implementar el método venderPasaje($objPasajero) que debe incorporar el pasajero a la colección de pasajeros ( solo si hay espacio disponible), actualizar los costos abonados y retornar el costo final que deberá ser abonado por el pasajero.


Implemente la función hayPasajesDisponible() que retorna verdadero si la cantidad de pasajeros del viaje es menor a la cantidad máxima de pasajeros y falso caso contrario
*/

//Creo la clase y sus atributos
class Pasajero{
    private $nombre;
    private $apellido;
    private $nroDoc;
    private $telefono;
    private $nroAsiento;
    private $nroTicket;


    //Creo la función constructora
    public function __construct($pnombre, $papellido, $pnroDoc, $ptelefono, $pnroAsiento, $pnroTicket){
        $this->nombre = $pnombre;
        $this->apellido = $papellido;
        $this->nroDoc = $pnroDoc;
        $this->telefono = $ptelefono;
        $this->nroAsiento = $pnroAsiento;
        $this->nroTicket = $pnroTicket;
    }


    /*************************************************/
    /*************** MÉTODOS DE ACCESO ***************/
    /********************* SETERS ********************/
    /*************************************************/

    /**
     * Obtiene el valor de nombre
     * @param $nombre
     */
    public function setNombre($nombre){
        $this->nombre = $nombre;
    }

    /**
     * Obtiene el valor de apellido
     * @param $apellido
     */
    public function setApellido($apellido){
        $this->apellido = $apellido;
    }

    /**
     * Obtiene el valor de nroDoc
     * @param $nroDoc
     */
    public function setNroDoc($nroDoc){
        $this->nroDoc = $nroDoc;
    }

    /**
     * Obtiene el valor de telefono
     * @param $telefono
     */
    public function setTelefono($telefono){
        $this->telefono = $telefono;
    }

    /**
     * Seteal el valor de nroAsiento
     * @param $nroAsiento
     */
    public function setNroAsiento($nroAsiento){
        $this->nroAsiento = $nroAsiento;
    }

    /**
     * Obtiene el valor de nroTicket
     * @param $nroTicket
     */
    public function setNroTicket($nroTicket){
        $this->nroTicket = $nroTicket;
    }


    /*************************************************/
    /*************** MÉTODOS DE ACCESO ***************/
    /********************* GETERS ********************/
    /*************************************************/

    /**
     * Obtiene el valor de nombre
     */
    public function getNombre(){
        return $this->nombre;
    }

    /**
     * Obtiene el valor de apellido
     */
    public function getApellido(){
        return $this->apellido;
    }
    
    /**
     * Obtiene el valor de nroDoc
     */
    public function getNroDoc(){
        return $this->nroDoc;
    }

    /**
     * Obtiene el valor de telefono
     */
    public function getTelefono(){
        return $this->telefono;
    }

    /**
     * Obtiene el valor de nroAsiento
     */
    public function getNroAsiento(){
        return $this->nroAsiento;
    }

    /**
     * Obtiene el valor de nroTicket
     */
    public function getNroTicket(){
        return $this->nroTicket;
    }


    /*************************************************/
    /******************* toString ********************/
    /*************************************************/

    public function __toString(){
        $msjToString = "\nEl nombrre del pasajero es: ".$this->getNombre()."\nEl apellido del pasajero es: ".$this->getApellido()."\nEl número de documento del pasajero es: ".$this->getNroDoc()."\nEl teléfono del pasajero es: ".$this->getTelefono()."\nEl número de asiento es: ".$this->getNroAsiento()."\nEl número de ticket es: ".$this->getNroTicket()."\n\n";
        return $msjToString;
    }



    /*************************************************/
    /***************** OTROS MÉTODOS *****************/
    /*************************************************/

    /**
     * Incrementa el monto del pasaje y retorna el porcentaje que debe aplicarse como incremento según las características del pasajero.
     * STANDAR: Para los pasajeros comunes el porcentaje de incremento es del 10 %
     * VIP: Para un pasajero VIP se incrementa el importe un 35% y si la cantidad de millas acumuladas supera a las 300 millas se realiza un incremento del 30%
     * ESPECIAL: Si el pasajero tiene necesidades especiales y requiere silla de ruedas, asistencia y comida especial entonces el pasaje tiene un incremento del 30%; si solo requiere uno de los servicios prestados entonces el incremento es del 15%.
     * @return INT
     */
    public function darPorcentajeIncremento(){
        //Invoco datos a utilizar
       // $costo = $viaje->getCosto(); //CONSULTAR**********************************

        //Inicializo variables
       // $i = 0;
       // $cant = count($colP);
        $porcentajeAumento = 10;  //$costo * 1.1; --> Esto me da el 110% del valor total

        //Recorrido exaustivo, da los porcentajes de aumento para todos los pasajeros
     /*   for($i = 0; $i < $cant; $i++){
            $pasajero = $colP[$i];

            if(){

            }
            $i++;
         }*/
        return $porcentajeAumento;
    }

}

/*
    public function mostrarDatosPasajeros(){
        $cadena="";
        $colP = $this->getColPasajeros();
        for($i = 0; $i < count($colP); $i++){
            $nombre = $colP[$i]["nombre"];
            $apellido = $colP[$i]["apellido"];
            $dni = $colP[$i]["dni"];
            $telefono =$colP[$i]["telefono"];
            $cadena = $cadena."  Pasajero ".$i.": ".$nombre." ".$apellido." - DNI N° ".$dni." - Teléfono: ".$telefono."\n\n";
        }
        return $cadena;
    }



    public function buscarPasajero($pdni){
        $colP = $this->getColPasajeros();

        //Uso while porque corta cuando lo encuentra
        $i = 0;
        $encontro = false; //Es una bandera
        while ($i < count($colP) && !$encontro){
            $encontro = $colP[$i]["dni"] == $pdni;
            
            //Acá puedo poner in if que si no encuentra, incrementa el $i y, si encuentra sale
            
             $i++; //$i = $i+ 1
        }
        return $i - 1;
    }



    public function modificarPasajero($nuevoNombre, $nuevoApellido, $nuevoDni, $nuevoTelefono, $dniAbuscar){
        $indice = $this->buscarPasajero($dniAbuscar);
        if ($indice >= 0){ //Si lo encuentra
            $colP = $this->getColPasajeros();
            $colP[$indice]["nombre"] = $nuevoNombre;
            $colP[$indice]["apellido"] = $nuevoApellido;
            $colP[$indice]["dni"] = $nuevoDni;
            $colP[$indice]["telefono"] = $nuevoTelefono;
            $this->setColPasajeros($colP);
        }
        return $indice;
    }


    Public function agregarPasajero($nombreNuevoPasajero, $ApellidoNuevoPasajero, $dniNuevoPasajero, $telefonoNuevoPasajero){
        $colP = $this->getColPasajeros();

        //Me fijo si hay capacidad para un pasajero más
        if($this->getCantMaxPasajeros() >= count($colP)){
            $colP[] = ["nombre" => $nombreNuevoPasajero, "apellido" => $ApellidoNuevoPasajero, "dni" => $dniNuevoPasajero, "telefono" => $telefonoNuevoPasajero];
            $this->setColPasajeros($colP);
        }
    }*/
