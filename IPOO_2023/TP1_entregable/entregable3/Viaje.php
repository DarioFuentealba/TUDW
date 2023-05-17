<?php

/*
La empresa de transporte desea gestionar la información correspondiente a los pasajeros de los Viajes que pueden ser: Pasajeros estándares, Pasajeros VIP y Pasajeros con necesidades especiales. 

La clase Pasajero tiene como atributos el nombre, el número de asiento y el número de ticket del pasaje del viaje. La clase "PasajeroVIP" tiene como atributos adicionales el número de viajero frecuente y cantidad de millas de pasajero. La clase Pasajeros con necesidades especiales se refiere a pasajeros que pueden requerir servicios especiales como sillas de ruedas, asistencia para el embarque o desembarque, o comidas especiales para personas con alergias o restricciones alimentarias.  Implementar el método darPorcentajeIncremento() que retorne el porcentaje que debe aplicarse como incremento según las características del pasajero. Para un pasajero VIP se incrementa el importe un 35% y si la cantidad de millas acumuladas supera a las 300 millas se realiza un incremento del 30%. Si el pasajero tiene necesidades especiales y requiere silla de ruedas, asistencia y comida especial entonces el pasaje tiene un incremento del 30%; si solo requiere uno de los servicios prestados entonces el incremento es del 15%. Por último, para los pasajeros comunes el porcentaje de incremento es del 10 %.


Modificar la clase viaje para almacenar el costo del viaje, la suma de los costos abonados por los pasajeros e implementar el método venderPasaje($objPasajero) que debe incorporar el pasajero a la colección de pasajeros ( solo si hay espacio disponible), actualizar los costos abonados y retornar el costo final que deberá ser abonado por el pasajero.


Implemente la función hayPasajesDisponible() que retorna verdadero si la cantidad de pasajeros del viaje es menor a la cantidad máxima de pasajeros y falso caso contrario
*/

//Creo la clase y sus atributos
class Viaje{
    private $codigo;
    private $destino;
    private $cantMaxPasajeros;
    private $colPasajero;
    private $objResponsable;
    private $costoViaje;
    private $sumaCostos;


    //Creo la funcion constructora
    public function __construct($pcodigo, $pdestino, $pcantMaxPasajeros, $pcolPasajero, $pobjResponsable, $pcostoViaje, $psumaCostos){
        $this -> codigo = $pcodigo;
        $this -> destino = $pdestino;
        $this -> cantMaxPasajeros = $pcantMaxPasajeros;
        $this -> colPasajero = $pcolPasajero;
        $this -> objResponsable = $pobjResponsable;
        $this -> costoViaje = $pcostoViaje;
        $this -> sumaCostos = $psumaCostos;
    }


    /*************************************************/
    /*************** MÉTODOS DE ACCESO ***************/
    /********************* SETERS ********************/
    /*************************************************/

    /**
    * Setea el valor de codigo
    * @param $codigo
    */
    public function setCodigo($codigo){
        $this -> codigo = $codigo;
    }

    /**
     * Setea el valor de destino
     * @param $destino
     */
    public function setDestino($destino){
        $this -> destino = $destino;
    }

    /**
     * Setea el valor de cantMaxPasajeros
     * @param $cantMaxPasajeros
     */
    public function setCantMaxPasajeros($cantMaxPasajeros){
        $this -> cantMaxPasajeros = $cantMaxPasajeros;
    }

    /**
     * Setea el valor de colPasajero
     * @param $colPasajero
     */
    public function setColPasajero($colPasajero){
        $this -> colPasajero = $colPasajero;
    }

    /**
     * Setea el valor de objResponsable
     * @param $objResponsable
     */
    public function setObjResponsable($objResponsable){
        $this -> objResponsable = $objResponsable;
    }

    /**
     * Setea el valor de costoViaje
     * @param $costoViaje
     */
    public function setCostoViaje($costoViaje){
        $this -> costoViaje = $costoViaje;
    }

    /**
     * Setea el valor de sumaCostos
     * @param $sumaCostos
     */
    public function setSumaCostos($sumaCostos){
        $this -> sumaCostos = $sumaCostos;
    }


    /*************************************************/
    /*************** MÉTODOS DE ACCESO ***************/
    /********************* GETERS ********************/
    /*************************************************/

    /**
    * Obtiene el valor de codigo
    */
    public function getCodigo(){
        return $this -> codigo;
    }

    /**
    * Obtiene el valor de destino
    */
    public function getDestino(){
        return $this -> destino;
    }

    /**
    * Obtiene el valor de cantMaxPasajeros
    */
    public function getCantMaxPasajeros(){
        return $this -> cantMaxPasajeros;
    }

    /**
    * Obtiene el valor de colPasajero
    */
    public function getColPasajero(){
        return $this -> colPasajero;
    }

    /**
    * Obtiene el valor de objResponsable
    */
    public function getObjResponsable(){
        return $this -> objResponsable;
    }

    /**
    * Obtiene el valor de costoViaje
    */
    public function getCostoViaje(){
        return $this -> costoViaje;
    }

    /**
    * Obtiene el valor de sumaCostos
    */
    public function getSumaCostos(){
        return $this -> sumaCostos;
    }


    /*************************************************/
    /******************* toString ********************/
    /*************************************************/

    public function __toString(){
        $cadena = "\nCódigo del viaje: ".$this->getCodigo()."\nDestino: ".$this->getDestino()."\nCant Máx Pasajeros: ".$this->getCantMaxPasajeros()."\nLos datos de los pasajero son: ".$this->mostrarPasajero()."\nLos datos del responsable son: ".$this->getObjResponsable()./*$this->mostrarDatosPasajeros().*/"\nEl costo del viaje es: ".$this->getCostoViaje()."\nLa suma de los costos del viaje es: ".$this->getSumaCostos()."\n\n";
        return $cadena;
    }
    

    /*************************************************/
    /***************** OTROS MÉTODOS *****************/
    /*************************************************/

    /**
     * Muestra los datos de los pasajeros
     * @param 
     * @param 
     * @return 
     */
    public function mostrarPasajero(){
        //Invoco los datos que voy a usar
        $colP = $this->getColPasajero();
        $texto = "\n\nLos pasajeros son: \n";
        $cantidad = count($colP);
        for($i = 0; $i < $cantidad; $i++){
            $texto = $texto.$colP[$i];
        }
        return $texto;
    }


    /**
     * Debe incorporar el pasajero a la colección de pasajeros ( solo si hay espacio disponible).
     * Actualizar los costos abonados.
     * Retornar el costo final que deberá ser abonado por el pasajero.
     * @param  $objPasajero //ACA EN LUGAR DE FLOAT, STRING... PONGO Pasajero... pero ¿qué pasajero?
     * @return FLOAT $costoFinal
     */
    public function venderPasaje($objPasajero){
        //Invoco los datos necesarios
        $hayLugar = $this->hayPasajesDisponible();
        $costo = $this->getCostoViaje();
       // $cantMillas = $objPasajero->getCantMillas();
      //  $silla = $objPasajero->getSilla();
      //  $asistencia = $objPasajero->getAsistencia();
       // $comida = $objPasajero->getComida();
        $porcentajeAumento = $objPasajero->darPorcentajeIncremento();

        if($hayLugar){

            $aumento = $porcentajeAumento / 100;
            $costoFinal = $costo + ($costo * $aumento);

            //Valor que retorno
            $texto = $costoFinal;
        }else{
            //Valor que retorno
            $texto = "No hay lugar disponible para agregar al pasajero.";
        }
        return $texto;
    }


    /**
     * Verifica si hay espacio disponible para agregar un pasajero.
     *  Retorna verdadero si la cantidad de pasajeros del viaje es menor a la cantidad máxima de pasajeros y falso caso contrario.
     * @return BOOLEAN $encontro
     */
    public function hayPasajesDisponible(){
        //Invoco los datos a utilizar
        $cantMaxPasajeros = $this->getCantMaxPasajeros();
        $colPasajero = $this->getColPasajero();

        //Veo si hay espacio disponible para agregar un pasajero
        $cant = count($colPasajero);
        
        if($cant >= 0 && $cant < $cantMaxPasajeros){
            $hayLugar = true;
        }else{
            $hayLugar = false;
        }
        return $hayLugar;
    }



/**
 * Teniendo el dato del dni, verifica si ese pasajero ya esta cargado en el viaje
 * @param INT $dni
 * @return BOOLEAN
 */
    public function buscarPasajero($dni){
        //Invoco los datos que uso
        $colP = $this->getColPasajero();

        //Inicializo variable
        $i = 0;
        $cant = count($colP);
        $encontro = false;

        //Uso while, recorrido parcial
        while($i < $cant && !$encontro){
            if($colP[$i]->getNroDoc() == $dni){
                $encontro = true;
            }
            $i++;
        }
        return $encontro;
    }


  


}