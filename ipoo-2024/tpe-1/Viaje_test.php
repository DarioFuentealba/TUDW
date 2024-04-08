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

include_once("Viaje.php");
include_once("Pasajero.php");
include_once("Responsable.php");

//Creo los objetos Responsable, Pasajero y Viaje
//($nroEmpleado, $nroLicencia, $nombre, $apellido)
$objResponsable = new Responsable ("Emp-1", "Lic-1", "Verónica", "Murcia");
//$objResponsable2 = new Responsable ("Emp-2", "Lic-2", "Abel", "Oyola");

//Creo la coleccion de Responsables
//$colR = [$objResponsable1, $objResponsable2];

//($nombre, $apellido, $nroDNI, $telefono)
$objPersona1 = new Pasajero ("Dario", "Fuentealba", "DNI-1", "Tel-1");
$objPersona2 = new Pasajero ("Lucia", "García", "DNI-2", "Tel-2");
$objPersona3 = new Pasajero ("Sofia", "Silva", "DNI-3", "Tel-3");

//Creo la coleccion de pasajeros
$colP = [$objPersona1, $objPersona2, $objPersona3];

//($codigo, $destino, $cantMaxPasajeros, $colObjPasajero ,$objResponsable)
$objViaje = new Viaje(101, "Bariloche", 4, $colP, $objResponsable);

//Armo el menu de opciones
do{
    echo "\n\n*******************************************\nHola! Muchas gracias por elegir VIAJE FELIZ\n*******************************************\n\n¿Qué desea hacer?\n  1) Modificar los datos del viaje.\n  2) Cargar nuevo pasajero.\n  3) Cargar nuevo responsable.\n  4) Modificar el nombre, apellido y teléfono de un pasajero.\n  5) Mostrar los datos del viaje.\n  6) Salir\n";
    $opcion = trim(fgets(STDIN));

    switch($opcion){
        case "1":
            //Modificar los datos del viaje
            do{
                //Submenú para ver que modifico del viaje
                echo "¿Qué datos del viaje desea modificar?\n    1) Modificar el código.\n    2) Modificar el destino.\n    3) Modificar la cantidad máxima de pasajeros.\n    4) Volver al menú anterior.\n";
                $opcionLetra = trim(fgets(STDIN));

                switch($opcionLetra){
                    case "1":
                        //Modificar el código del viaje
                        echo "Ingrese el nuevo código del viaje aaaaaaaaaaaaaaaaaaaaaa\n";
                        $codigoNuevo = trim(fgets(STDIN));
                        $objViaje->setCodigo($codigoNuevo);
                        // Volver al menú anterior
                        //$opcionLetra = "4"; // Establecer la opción para salir del bucle interno        
                        break;

                    case "2":
                        //Modificar el destino del viaje
                        echo "Ingrese el nuevo destino del viaje bbbbbbbbbbbbbbbbbbbbbb\n";
                        $destinoNuevo = trim(fgets(STDIN));
                        $objViaje->setDestino($destinoNuevo);
                        // Volver al menú anterior
                        //$opcionLetra = "4"; // Establecer la opción para salir del bucle interno        

                        break;

                    case "3":
                        //Modificar la cantidad máxima de pasajeros del viaje
                        echo "Ingrese la nueva cantidad máxima de pasajeros ccccccccccccccccccccccc\n";
                        $cantMaxPasajerosNuevo = trim(fgets(STDIN));
                        $objViaje->setCantMaxPasajeros($cantMaxPasajerosNuevo);
                        // Volver al menú anterior
                        //$opcionLetra = "4"; // Establecer la opción para salir del bucle interno        

                        break;

                    case "4":
                        //Volver al menú anterior
                        echo "Volviendo al menú anterior ddddddddddddddddddd\n";
                        break;

                    default;
                    echo "Opción inválida. Por favor ingrese una opción del 1 al 4.\n\n";
                    break;
                }
            }while($opcionLetra != "4");
            break;

        case "2":
            //Cargar nuevo pasajero
                echo "Ingrese el nombreef del pasajero:\n";
                $nombre = trim(fgets(STDIN));

                echo "Ingrese el apellido del pasajero:\n";
                $apellido = trim(fgets(STDIN));

                echo "Ingrese el N° de DNI del pasajero:\n";
                $nroDNI = trim(fgets(STDIN));

                echo "Ingrese el teléfono del pasajero:\n";
                $telefono = trim(fgets(STDIN));

            if($objViaje->verificarLugar() == false){
                echo "No se puede cargar al pasajero porque no hay lugares disponibles 222222222222222222222\n";
            }else{
                if($objViaje->cargarPasajero($nombre, $apellido, $nroDNI, $telefono) == true){
                echo "Se agregó al pasajero ".$nombre." ".$apellido." al viaje 222222222222222222\n\n";
                }else{
                    echo "No se puede agregar al pasajero porque su DNI ya está registrado en la lista de pasajeros 22222222222222222222222\n\n";
                }
            }
            break;

        case "3":
            //Cargar nuevo responsable
            echo "Ingrese el N° de empleado del responsable:\n";
            $nroEmpleado = trim(fgets(STDIN));

            echo "Ingrese el N° de licencia del responsable:\n";
            $nroLicencia = trim(fgets(STDIN));

            echo "Ingrese el nombre del responsable:\n";
            $nombre = trim(fgets(STDIN));

            echo "Ingrese el apellido del responsable:\n";
            $apellido = trim(fgets(STDIN));

            // Cargar el nuevo responsable en el objeto Viaje
            $objViaje->cargarResponsable($nroEmpleado, $nroLicencia, $nombre, $apellido);

            echo "Se cargó el nuevo responsable cuyo N° de empleado es ".$nroEmpleado." 333333333333333333333\n\n";
            break;

        case "4":
            //Modificar el nombre, apellido y teléfono de un pasajero
            echo "Ingrese el N° de DNI del pasajero:\n";
            $nroDNI = trim(fgets(STDIN));

            //Uso el nroDNI para verificar si el pasajero esta en la lista de viaje, si no lo esta, no continuo con la modificacion de datos
            if($objViaje->buscarPasajeros($nroDNI) != -1){
                //Continuo con la modificacion de datos
                echo "Ingrese el nombre del pasajero:\n";
                $nombre = trim(fgets(STDIN));
    
                echo "Ingrese el apellido del pasajero:\n";
                $apellido = trim(fgets(STDIN));
    
                echo "Ingrese el teléfono del pasajero:\n";
                $telefono = trim(fgets(STDIN));

                //Uso la funcion Viaje->modificarPasajero para cargar los datos
                $objViaje->modificarPasajero($nombre, $apellido, $nroDNI, $telefono);

                echo "Se modificaron los datos del pasajero 4444444444444444444\n\n";
            }else{
                echo "No se pueden modificar los datos porque el pasajero cuyo N° de DNI es ".$nroDNI." no se encuentra en la lista de viaje 4444444444444444444\n\n";
            }
            break;

        case "5":
            //Mostrar los datos del viaje
            echo "Los datos del viaje son: \n".$objViaje." 5555555555555555555555555\n\n";
            break;

        case "6":
            //Salir
            echo "Saliendo.\n\n";
            break;

        default;
        echo "Opción inválida. Por favor ingrese una opción del 1 al 4.\n\n";
            break;
    }
}while($opcion != "6");




