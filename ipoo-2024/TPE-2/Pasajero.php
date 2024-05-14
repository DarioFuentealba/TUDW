<?php
/*
Importante: Deben enviar el link a la resolución en su repositorio en GitHub del ejercicio.

La empresa de Transporte de Pasajeros “Viaje Feliz” quiere registrar la información referente a sus viajes. De cada viaje se precisa almacenar el código del mismo, destino, cantidad máxima de pasajeros y los pasajeros del viaje.

Realice la implementación de la clase Viaje e implemente los métodos necesarios para modificar los atributos de dicha clase (incluso los datos de los pasajeros). Utilice clases y arreglos  para   almacenar la información correspondiente a los pasajeros. Cada pasajero guarda  su “nombre”, “apellido” y “numero de documento”.

Implementar un script testViaje.php que cree una instancia de la clase Viaje y presente un menú que permita cargar la información del viaje, modificar y ver sus datos.

Modificar la clase Viaje para que ahora los pasajeros sean un objeto que tenga los atributos nombre, apellido, numero de documento y teléfono. El viaje ahora contiene una referencia a una colección de objetos de la clase Pasajero. También se desea guardar la información de la persona responsable de realizar el viaje, para ello cree una clase ResponsableV que registre el número de empleado, número de licencia, nombre y apellido. La clase Viaje debe hacer referencia al responsable de realizar el viaje.

Implementar las operaciones que permiten modificar el nombre, apellido y teléfono de un pasajero. Luego implementar la operación que agrega los pasajeros al viaje, solicitando por consola la información de los mismos. Se debe verificar que el pasajero no este cargado mas de una vez en el viaje. De la misma forma cargue la información del responsable del viaje.

Nota: Recuerden que deben enviar el link a la resolución en su repositorio en GitHub.


? 2do TP Entregable

La clase Pasajero tiene como atributos el nombre, el número de asiento y el número de ticket del pasaje del viaje.

Implementar el método darPorcentajeIncremento() que retorne el porcentaje que debe aplicarse como incremento según las características del pasajero. 

Para un pasajero VIP se incrementa el importe un 35% y si la cantidad de millas acumuladas supera a las 300 millas se realiza un incremento del 30%. 

Si el pasajero tiene necesidades especiales y requiere silla de ruedas, asistencia y comida especial entonces el pasaje tiene un incremento del 30%; si solo requiere uno de los servicios prestados entonces el incremento es del 15%. 

Por último, para los pasajeros comunes el porcentaje de incremento es del 10 %.
*/

//Creo la clase y sus atributos
class Pasajero{
    private $nombre;
    private $apellido;
    private $nroDNI;
    private $telefono;
    private $nroAsiento;
    private $nroTicket;
    private $porcentajeIncremento;

    //Creo la función constructora
    public function __construct($pnombre, $papellido, $pnroDNI, $ptelefono, $pnroAsiento, $pnroTicket){
        $this->nombre = $pnombre;
        $this->apellido = $papellido;
        $this->nroDNI = $pnroDNI;
        $this->telefono = $ptelefono;
        $this->nroAsiento = $pnroAsiento;
        $this->nroTicket = $pnroTicket;
        $this->porcentajeIncremento = 10;
    }


    /*************** MÉTODOS DE ACCESO ***************/
    /********************* SETERS ********************/


    //Setea el valor de nombre
    public function setNombre($nombre){
        $this->nombre = $nombre;
    }

    //Setea el valor de apellido
    public function setApellido($apellido){
        $this->apellido = $apellido;
    }

    //Setea el valor de nroDNI
    public function setNroDNI($nroDNI){
        $this->nroDNI = $nroDNI;
    }

    //Setea el valor de telefono
    public function setTelefono($telefono){
        $this->telefono = $telefono;
    }

    //Setea el valor de nroAsiento
    public function setNroAsiento($nroAsiento){
        $this->nroAsiento = $nroAsiento;
    }

    //Setea el valor de nroTicket
    public function setNroTicket($nroTicket){
        $this->nroTicket = $nroTicket;
    }

    //Setea el valor de porcentajeIncremento
    public function setPorcentajeIncremento($porcentajeIncremento){
        $this->porcentajeIncremento = $porcentajeIncremento;
    }


    /*************** MÉTODOS DE ACCESO ***************/
    /********************* GETERS ********************/


    //Obtiene el valor de nombre
    public function getNombre(){
        return $this->nombre;
    }

    //Obtiene el valor de apellido
    public function getApellido(){
        return $this->apellido;
    }

    //Obtiene el valor de nroDNI
    public function getNroDNI(){
        return $this->nroDNI;
    }

    //Obtiene el valor de telefono
    public function getTelefono(){
        return $this->telefono;
    }

    //Obtiene el valor de nroAsiento
    public function getNroAsiento(){
        return $this->nroAsiento;
    }

    //Obtiene el valor de nroTicket
    public function getNroTicket(){
        return $this->nroTicket;
    }

    //Obtiene el valor de porcentajeIncremento
    public function getPorcentajeIncremento(){
        return $this->porcentajeIncremento;
    }


    /******************* toString ********************/


    public function __toString(){
        $msjToString = "\n\nNombre del pasajero: ".$this->getnombre()."\nApellido del pasajero: ".$this->getapellido()."\nN° de documento del pasajero: ".$this->getnroDNI()."\nN° de teléfono del pasajero: ".$this->getTelefono()."\nN° de asiento: ".$this->getNroAsiento()."\nN° de ticket: ".$this->getNroTicket()."\n\nPorcentaje de incremento a pasajero estándar: ".$this->getPorcentajeIncremento()."\n\n";

        return $msjToString;
    }
    

    /***************** OTROS MÉTODOS *****************/


    /**
     * Implementar el método darPorcentajeIncremento() que retorne el porcentaje que debe aplicarse como incremento según las características del pasajero. 
     * @return FLOAT $porcentajeIncremento
     */
    public function darPorcentajeIncremento(){
        $porcentajeIncremento = $this->getPorcentajeIncremento();
        return $porcentajeIncremento;
    }
}