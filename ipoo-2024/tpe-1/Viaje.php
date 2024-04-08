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
class Viaje{
    private $codigo;
    private $destino;
    private $cantMaxPasajeros;
    private $colObjPasajero;
    private $objResponsable;

    //Creo la función constructora
    public function __construct($pcodigo, $pdestino, $pcantMaxPasajeros, $pcolObjPasajero, $pobjResponsable){
        $this->codigo = $pcodigo;
        $this->destino = $pdestino;
        $this->cantMaxPasajeros = $pcantMaxPasajeros;
        $this->colObjPasajero = $pcolObjPasajero;
        $this->objResponsable = $pobjResponsable;
    }


    /*************** MÉTODOS DE ACCESO ***************/
    /********************* SETERS ********************/


    //Setea el valor de codigo
    public function setCodigo($codigo){
        $this->codigo = $codigo;
    }

    //Setea el valor de destino
    public function setDestino($destino){
        $this->destino = $destino;
    }

    //Setea el valor de cantMaxPasajeros
    public function setCantMaxPasajeros($cantMaxPasajeros){
        $this->cantMaxPasajeros = $cantMaxPasajeros;
    }

    //Setea el valor de colObjPasajero
    public function setColObjPasajero($colObjPasajero){
        $this->colObjPasajero = $colObjPasajero;
    }

    //Setea el valor de objResponsable
    public function setObjResponsable($objResponsable){
        $this->objResponsable = $objResponsable;
    }


    /*************** MÉTODOS DE ACCESO ***************/
    /********************* GETERS ********************/


    //Obtiene el valor de codigo
    public function getCodigo(){
        return $this->codigo;
    }

    //Obtiene el valor de destino
    public function getDestino(){
        return $this->destino;
    }

    //Obtiene el valor de cantMaxPasajeros
    public function getCantMaxPasajeros(){
        return $this->cantMaxPasajeros;
    }

    //Obtiene el valor de colObjPasajero
    public function getColObjPasajero(){
        return $this->colObjPasajero;
    }

    //Obtiene el valor de objResponsable
    public function getObjResponsable(){
        return $this->objResponsable;
    }


    /******************* toString ********************/


    public function __toString(){
        $msjToString = "\n\nCódigo del viaje: ".$this->getCodigo()."\nDestino del viaje: ".$this->getDestino()."\nCantidad máxima de pasajeros: ".$this->getCantMaxPasajeros()."\nLos datos de los pasajeros son: ".$this->mostrarPasajeros()."\nEl responsable del viaje es: ".$this->getObjResponsable()."\n\n";

        return $msjToString;
    }



        /***************** OTROS MÉTODOS *****************/



    /**
     * Mostrar datos de los pasajeros
     * @return INT $cadena
     */
    public function mostrarPasajeros(){
        //Inicializo variables
        $colP = $this->getColObjPasajero();
        $cadena = "";

        //Uso for porque conozco la cantidad de ciclos que hara
        for($i = 0; $i < count($colP); $i++){
            $nombre = $colP[$i]->getNombre();
            $apellido = $colP[$i]->getApellido();
            $nroDNI = $colP[$i]->getNroDNI();
            $telefono = $colP[$i]->getTelefono();
            $cadena = $cadena."\n    Pasajero ".($i+1).": ".$nombre." ".$apellido." - DNI N° ".$nroDNI." - Teléfono: ".$telefono;
        }
        return $cadena;
    }


    /**
     * Busca un pasajero y verifica si esta cargado o no en el viaje
     * @param INT $nroDNI
     * @return INT $indice
     */
    public function buscarPasajeros($nroDNI){
        //Inicializo variables
        $colP = $this->getColObjPasajero();

        //Uso while porque corta cuando lo encuentra
        $encontro = false; //Es una bandera
        $i = 0;
        while($i < count($colP) && !$encontro){
            if($nroDNI == $colP[$i]->getNroDNI()){
                $encontro = true;
            }
            $i++;
        }

        //Si encuentra la funcion, me devuelve el indice en el que esta pero aumentado en 1, o sea, si la funcion esta en el indice 3, me va a devolver 4.
        //Si no la encuentra, me devuelve el tamanio del array. 
        //El problema es si encuentra la funcion y es la ultima, al devolver el indice aumentado en 1, la ultima me daria el tamanio del array. Para resolver eso, hago lo siguiente:
        if($encontro == true){
            $indice = $i - 1;
        }else{
            $indice = -1;
        }
        return $indice;
    }


    /**
     * Verifica que haya lugar para agregar un nuevo pasajero
     * @param INT $codigoViejo
     * @param INT $codigoNuevo
     * @param STRING $destinoNuevo
     * @param INT $cantMaxPasajeronNuevo
     * @param OBJ $objResponsable
     * @return BOOLEAN $boolAgregar
     */
    public function verificarLugar(){
    //Inicializo variables
    $colP = $this->getColObjPasajero();
    $boolAgregar = false; //Bandera

    //Verifico si la capcidad de pasajeros del viaje esta completa
    if($this->getCantMaxPasajeros() > count($colP)){
        $boolAgregar = true;
    }
    return $boolAgregar;
    }


    /**
     * Cargar pasajero verificando que no se encuentra ya cargado en la lista del viaje
     * @param STRING $nombre
     * @param STRING $apellido
     * @param INT $nroDNI
     * @param INT $telefono
     * @return BOOLEAN $boolAgregar
     */
    public function cargarPasajero($nombre, $apellido, $nroDNI, $telefono){
        //Inicializo variables
        $boolAgregar = false; //Bandera

        //Verifico si el pasajero se puede agregar o si ya se encuentra en el listado del viaje
        if($this->buscarPasajeros($nroDNI) == -1 && $this->verificarLugar()){
            //Inicializo variables
            $colP = $this->getColObjPasajero();

            //Creo un nuevo objeto pasajero
            $objPasajero = new Pasajero($nombre, $apellido, $nroDNI, $telefono);

            array_push($colP, $objPasajero); //Agrego al objeto pasajero a la coleccion de pasajeros
            $this->setColObjPasajero($colP); //Guardo los datos
            $boolAgregar = true; //Modifico el valor de la bandera
        }
        return $boolAgregar;
    }


    /**
     * Cargar nuevo Responsable
     * @param INT $nroEmpleado
     * @param INT $nroLicencia
     * @param STRING $nombre
     * @param STRING $apellido
     */
    public function cargarResponsable($nroEmpleado, $nroLicencia, $nombre, $apellido){
            //Creo un objeto responsable
            $objResponsable = new Responsable ($nroEmpleado, $nroLicencia, $nombre, $apellido);
            $this->setObjResponsable($objResponsable); //Cargo los datos
    }


    /**
     * Modificar el nombre, apellido y teléfono de un pasajero
     * @param STRING $nombre
     * @param STRING $apellido
     * @param INT $nroDNI
     * @param INT $telefono
     */
    public function modificarPasajero($nombre, $apellido, $nroDNI, $telefono){
        $colP = $this->getColObjPasajero($nroDNI);

        if($this->buscarPasajeros($nroDNI) != -1){
            //Cargo los datos
            $colP[$this->buscarPasajeros($nroDNI)]->setNombre($nombre);
            $colP[$this->buscarPasajeros($nroDNI)]->setApellido($apellido);
            $colP[$this->buscarPasajeros($nroDNI)]->setNroDNI($nroDNI);
            $colP[$this->buscarPasajeros($nroDNI)]->setTelefono($telefono);
        }
    }
}