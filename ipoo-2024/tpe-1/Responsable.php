<?php
/*
Importante: Deben enviar el link a la resolución en su repositorio en GitHub del ejercicio.

La empresa de Transporte de Pasajeros “Viaje Feliz” quiere registrar la información referente a sus viajes. De cada viaje se precisa almacenar el código del mismo, destino, cantidad máxima de pasajeros y los pasajeros del viaje.

Realice la implementación de la clase Viaje e implemente los métodos necesarios para modificar los atributos de dicha clase (incluso los datos de los pasajeros). Utilice clases y arreglos  para   almacenar la información correspondiente a los pasajeros. Cada pasajero guarda  su “nombre”, “apellido” y “numero de documento”.

Implementar un script testViaje.php que cree una instancia de la clase Viaje y presente un menú que permita cargar la información del viaje, modificar y ver sus datos.

Modificar la clase Viaje para que ahora los pasajeros sean un objeto que tenga los atributos nombre, apellido, numero de documento y teléfono. El viaje ahora contiene una referencia a una colección de objetos de la clase Pasajero. También se desea guardar la información de la persona responsable de realizar el viaje, para ello cree una clase ResponsableV que registre el número de empleado, número de licencia, nombre y apellido. La clase Viaje debe hacer referencia al responsable de realizar el viaje.

Implementar las operaciones que permiten modificar el nombre, apellido y teléfono de un pasajero. Luego implementar la operación que agrega los pasajeros al viaje, solicitando por consola la información de los mismos. Se debe verificar que el pasajero no este cargado mas de una vez en el viaje. De la misma forma cargue la información del responsable del viaje.

Nota: Recuerden que deben enviar el link a la resolución en su repositorio en GitHub.
*/

//Creo la clase y sus atributos
class Responsable{
    private $nroEmpleado;
    private $nroLicencia;
    private $nombre;
    private $apellido;

    //Creo la función constructora
    public function __construct($pnroEmpleado, $pnroLicencia, $pnombre, $papellido){
        $this->nroEmpleado = $pnroEmpleado;
        $this->nroLicencia = $pnroLicencia;
        $this->nombre = $pnombre;
        $this->apellido = $papellido;
    }


    /*************** MÉTODOS DE ACCESO ***************/
    /********************* SETERS ********************/


    //Setea el valor de nroEmpleado
    public function setNroEmpleado($nroEmpleado){
        $this->nroEmpleado = $nroEmpleado;
    }

    //Setea el valor de nroLicencia
    public function setNroLicencia($nroLicencia){
        $this->nroLicencia = $nroLicencia;
    }

    //Setea el valor de nombre
    public function setNombre($nombre){
        $this->nombre = $nombre;
    }

    //Setea el valor de apellido
    public function setApellido($apellido){
        $this->apellido = $apellido;
    }


    /*************** MÉTODOS DE ACCESO ***************/
    /********************* GETERS ********************/


    //Obtiene el valor de nroEmpleado
    public function getNroEmpleado(){
        return $this->nroEmpleado;
    }

    //Obtiene el valor de nroLicencia
    public function getNroLicencia(){
        return $this->nroLicencia;
    }

    //Obtiene el valor de nombre
    public function getNombre(){
        return $this->nombre;
    }

    //Obtiene el valor de apellido
    public function getApellido(){
        return $this->apellido;
    }


    /******************* toString ********************/


    public function __toString(){
        $msjToString = "\n    N° de empleado: ".$this->getNroEmpleado()."\n    N° de licencia: ".$this->getNroLicencia()."\n    Nombre: ".$this->getNombre()."\n    Apellido: ".$this->getApellido()."\n\n";

        return $msjToString;
    }
}