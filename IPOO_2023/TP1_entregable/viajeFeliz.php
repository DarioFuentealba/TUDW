<?php

//Creo la clase y sus atributos
class viaje{
    private $codigoViaje;
    private $destino;
    private $cantMaxPasajeros;
    private $pasajeros;


    //Creo la funcion constructora
    public function __construct($codigoViaje, $destino, $cantMaxPasajeros, $pasajeros){
        $this -> codigoViaje = $codigoViaje;
        $this -> destino = $destino;
        $this -> cantMaxPasajeros = $cantMaxPasajeros;
        $this -> pasajeros = $pasajeros;
    }


    /**************************************/
    /*MODULOS QUE SETEAN LOS VALORES DE LOS ATRIBUTOS*/
    /**************************************/

    /**
    * Setea el valor de codigoViaje
    */
    public function setCodigoViaje($codigoViaje){
        $this -> codigoViaje = $codigoViaje;
    }

    /**
     * Setea el valor de destino
     */
    public function setDestino($destino){
        $this -> destino = $destino;
    }

    /**
     * Setea el valor de cantMaxPasajeros
     */
    public function setCantMaxPasajeros($cantMaxPasajeros){
        $this -> cantMaxPasajeros = $cantMaxPasajeros;
    }

    /**
     * Setea el valor de pasajeros
     */
    public function setPasajeros($pasajeros){
        $this -> pasajeros = $pasajeros;
    }



    /**************************************/
    /*MODULOS QUE OBTIENEN LOS VALORES DE LOS ATRIBUTOS*/
    /**************************************/

    /**
    * Obtiene el valor de codigoViaje
    */
    public function getCodigoViaje(){
        return $this -> codigoViaje;
    }

    /**
    * Obtiene el valor de pdestinoB
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
    * Obtiene el valor de pasajeros
    */
    public function getPasajeros(){
        return $this -> pasajeros;
    }




    /**************************************/
    /***** METODOS *******/
    /**************************************/

    public function __toString(){
        return $this->escribirMensajeBienvenida()."\n\n".$this->seleccionarOpcion()."\n\n".$this->opcion();
    }


    // Da un mensaje bienvenida 
    public function escribirMensajeBienvenida(){
        echo "\n";
        echo "****************************************************\n";
        echo "** Bienvenido/a al menú de opciones de Viaje Feiz **\n";
        echo "***** La compañía N° 1 en servicios turísticos *****\n";
        echo "****************************************************\n\n";
    }



    //Crea el menu de opciones
    public function seleccionarOpcion(){
        echo "                  MENÚ DE OPCIONES                  \n";
        echo "****************************************************\n";
        echo "* 1) Cargar la información del viaje               *\n";
        echo "* 2) Modificar los datos de un pasajero            *\n";
        echo "* 3) Ver los datos de un pasajero                  *\n";
        echo "* 4) Salir                                         *\n";
        echo "****************************************************\n\n";
        echo "Ingrese la opcion deseada: ";    
        $opcion = trim(fgets(STDIN));
        echo "\n";
        return $opcion;
    }



    //Cargar la información del viaje
    public function arrayPasajeros(){
        $pasajeros=array(
            array("Nombre"=>"Dario", "Apellido"=>"Fuentealba", "DNI"=>"30123456"), //Índice 0
            array("Nombre"=>"Ayelen", "Apellido"=>"Silva", "DNI"=>"40123456"), //Índice 1
            array("Nombre"=>"Sofia", "Apellido"=>"Lihuen", "DNI"=>"50123456"), //Índice 2
            array("Nombre"=>"Edurne", "Apellido"=>"Gala", "DNI"=>"60123456") //Índice 3
        );
        
        // Imprimir el array usando print_r()
        return print_r($pasajeros);
    }

    //Inicialización de variables:
    public function opcion(){
        do {
            $opcion = $this->seleccionarOpcion();
            switch ($opcion) {  //la funcion switch reemplaza al condicional if-elseif, no compara, si no que tiene una opcion para cada caso, 
                                //en caso de no tener COINCIDENCIA para el valor ingresado, el apartado "default" determina que hacer.
                case 1: 
                    // 1) Cargar la información del viaje

                    //Array de pasajeros
                    $pasajeros=array(
                        array("Nombre"=>"Dario", "Apellido"=>"Fuentealba", "DNI"=>"30123456"), //Índice 0
                        array("Nombre"=>"Ayelen", "Apellido"=>"Silva", "DNI"=>"40123456"), //Índice 1
                        array("Nombre"=>"Sofia", "Apellido"=>"Lihuen", "DNI"=>"50123456"), //Índice 2
                        array("Nombre"=>"Edurne", "Apellido"=>"Gala", "DNI"=>"60123456") //Índice 3
                    );
                    print_r($pasajeros);
                    break;
                case 2:
                    // 2) Modificar los datos de un pasajero

                    //Array de pasajeros
                    $pasajeros=array(
                        array("Nombre"=>"Dario", "Apellido"=>"Fuentealba", "DNI"=>"30123456"), //Índice 0
                        array("Nombre"=>"Ayelen", "Apellido"=>"Silva", "DNI"=>"40123456"), //Índice 1
                        array("Nombre"=>"Sofia", "Apellido"=>"Lihuen", "DNI"=>"50123456"), //Índice 2
                        array("Nombre"=>"Edurne", "Apellido"=>"Gala", "DNI"=>"60123456") //Índice 3
                    );
                    // Definir el DNI del pasajero que quieres modificar
                    echo "Ingrese el DNI a buscar: ";
                    $buscar_dni = trim(fgets(STDIN));
                    echo "\n";

                    // Recorrer el array para buscar el pasajero
                    foreach($pasajeros as $key => $pasajero){
                        if($pasajero["DNI"] == $buscar_dni){
                            // Si se encuentra el pasajero, modificar su nombre, apellido y DNI
                            echo "Ingrese el nuevo Nombre: ";
                            $nuevoNombre = trim(fgets(STDIN));
                            $pasajeros[$key]["Nombre"] = $nuevoNombre;
                            echo "\n";

                            echo "Ingrese el nuevo Apellido: ";
                            $nuevoApellido = trim(fgets(STDIN));
                            $pasajeros[$key]["Apellido"] = $nuevoApellido;
                            echo "\n";

                            echo "Ingrese el nuevo DNI: ";
                            $nuevoDNI = trim(fgets(STDIN));
                            $pasajeros[$key]["DNI"] = $nuevoDNI;
                            echo "\n";

                            break; // Salir del ciclo foreach una vez que se ha encontrado el pasajero
                        }
                    }

                    // Imprimir el array actualizado
                    print_r($pasajeros);
                    break;
                case 3:
                    // 3) Ver los datos de un pasajero.
                    
                    // Recorrer el array para buscar al pasajero conociendo su DNI

                        //Array de pasajeros
                        $pasajeros=array(
                            array("Nombre"=>"Dario", "Apellido"=>"Fuentealba", "DNI"=>"30123456"), //Índice 0
                            array("Nombre"=>"Ayelen", "Apellido"=>"Silva", "DNI"=>"40123456"), //Índice 1
                            array("Nombre"=>"Sofia", "Apellido"=>"Lihuen", "DNI"=>"50123456"), //Índice 2
                            array("Nombre"=>"Edurne", "Apellido"=>"Gala", "DNI"=>"60123456") //Índice 3
                        );

                        //Busco a un pasajero por su DNI
                        echo "Ingrese el DNI que desea buscar: ";
                        $buscar_dni = trim(fgets(STDIN));
                        echo "\n";
                        foreach($pasajeros as $pasajero){
                            if($pasajero["DNI"] == $buscar_dni){
                                
                                // Si se encuentra el pasajero, acceder a sus datos usando su índice en el array
                                echo "El pasajero buscado es: \n";
                                echo "Nombre: " . $pasajero["Nombre"] . "\n";
                                echo "Apellido: " . $pasajero["Apellido"] . "\n";
                                echo "DNI: " . $pasajero["DNI"] . "\n\n";
                                break; // Salir del ciclo foreach una vez que se ha encontrado el pasajero
                            }
                        }
                    break;
                case 4: 
                    //Salir
                    echo "****************************************************\n";
                    echo "*   Muchas gracias por viajar con Viaje Felíz!!!   *\n";
                    echo "****************************************************\n\n";
                    echo "****************************************************\n";
                    echo "*                   Saliendo...                    *\n";
                    echo "****************************************************\n";
                    break;
                default:
                    //Caso general para cuando no se ingresa ninguna de la opciones del menu.
                    
                    echo "ERROR!!! Ingrese una opcion correcta \n\n";
                    break;
            }
        } while ($opcion != 4);
    }    
}
