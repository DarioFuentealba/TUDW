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
include_once("PasajeroVIP.php");
include_once("PasajeroNecesidad.php");
include_once("Responsable.php");

//Creo los objetos Responsable, Pasajero y Viaje
//($nroEmpleado, $nroLicencia, $nombre, $apellido)
$objResponsable = new Responsable ("Emp-1", "Lic-1", "Verónica", "Murcia");
//$objResponsable2 = new Responsable ("Emp-2", "Lic-2", "Abel", "Oyola");

//Creo la coleccion de Responsables
//$colR = [$objResponsable1, $objResponsable2];

//($pnombre, $papellido, $pnroDNI, $ptelefono, $pnroAsiento, $pnroTicket)
$objPersona1 = new Pasajero ("Dario", "Fuentealba", "DNI-1", "Tel-1", 11, "Ticket-01");
$objPersona2 = new Pasajero ("Lucia", "García", "DNI-2", "Tel-2", 22, "Ticket-02");
//($pnombre, $papellido, $pnroDNI, $ptelefono, $pnroAsiento, $pnroTicket, $pnroViajeroFrecuente, $pcantMillas)
$objPersona3 = new PasajeroVIP ("Sofia", "Silva", "DNI-3", "Tel-3", 33, "Ticket-03", "VF-03", 300, 35);
$objPersona4 = new PasajeroVIP ("Edurne", "Gala", "DNI-4", "Tel-4", 44, "Ticket-04", "VF-04", 301, 30);
//($pnombre, $papellido, $pnroDNI, $ptelefono, $pnroAsiento, $pnroTicket, $psillaRuedas, $pasistenciaEmbarque, $palimento)
$objPersona5 = new PasajeroNecesidad ("Federico", "Payllelef", "DNI-5", "Tel-5", 55, "Ticket-05", true, false, false);
$objPersona6 = new PasajeroNecesidad ("Juan Carlos", "Ayarachi", "DNI-6", "Tel-6", 66, "Ticket-06", true, true, false);
$objPersona7 = new PasajeroNecesidad ("Fernando", "Cruz", "DNI-7", "Tel-7", 77, "Ticket-07", true, true, true);

//Creo la coleccion de pasajeros
$colP = [$objPersona1, $objPersona2, $objPersona3, $objPersona4, $objPersona5, $objPersona6, $objPersona7];

//($pcodigo, $pdestino, $pcantMaxPasajeros, $pcolObjPasajero, $pobjResponsable, $pcostoViaje)
$objViaje = new Viaje(101, "Bariloche", 10, $colP, $objResponsable, 1000);


/*echo "****************************************** MOSTRAR DATOS VIAJE ******************************************\n";
echo $objViaje."\n";
echo "****************************************** FIN DATOS VIAJE ******************************************\n\n\n\n";
*/

echo "****************************************** MODIFICAR DATOS DEL VIAJE ******************************************\n";
//Modificar los datos del viaje
/*$codigoNuevo = 202;
$objViaje->setCodigo($codigoNuevo);

$destinoNuevo = "Damasco";
$objViaje->setDestino($destinoNuevo);

$cantMaxPasajerosNuevo = 25;
$objViaje->setCantMaxPasajeros($cantMaxPasajerosNuevo);

$costoViaje = 2000;
$objViaje->setCostoViaje($costoViaje);
echo "****************************************** FIN MODIFICAR DATOS DEL VIAJE ******************************************\n\n\n\n";


echo "****************************************** MOSTRAR DATOS VIAJE ******************************************\n";
echo $objViaje."\n";
echo "****************************************** FIN DATOS VIAJE ******************************************\n\n\n\n";


echo "****************************************** CARGAR NUEVO PASAJERO ******************************************\n";
//Cargar nuevo pasajero
$nombre = "Candelaria";
$apellido = "Mazoni";
$nroDNI = "DNI-8";
$telefono = "Tel-8";
$nroAsiento = 88;
$nroTicket = "Ticket-08";
$nroViajeroFrecuente ="";
$cantMillas = 0;
$sillaRuedas = true;
$asistenciaEmbarque = false;
$alimento = false;

if($objViaje->cargarPasajero($nombre, $apellido, $nroDNI, $telefono, $nroAsiento, $nroTicket, $nroViajeroFrecuente, $cantMillas, $sillaRuedas, $asistenciaEmbarque, $alimento)){
    echo "Se agregó un nuevo pasajero.\n";
}else{
    echo "No se agregó al pasajero.\n";
}
echo "****************************************** FIN CARGAR NUEVO PASAJERO ******************************************\n\n\n\n";


echo "****************************************** CARGAR NUEVO RESPONSABLE ******************************************\n";
//Cargar nuevo responsable
            $nroEmpleado = "Emp-2";
            $nroLicencia = "Lic-2";
            $nombre = "Paola";
            $apellido = "Núñez";

            // Cargar el nuevo responsable en el objeto Viaje
            $objViaje->cargarResponsable($nroEmpleado, $nroLicencia, $nombre, $apellido);
            echo "Se cargó el nuevo responsable cuyo N° de empleado es ".$nroEmpleado."\n";
echo "****************************************** FIN CARGAR NUEVO RESPONSABLE ******************************************\n\n\n\n";


echo "****************************************** MODIFICAR DATOS PASAJERO ******************************************\n";
//Modificar el nombre, apellido y teléfono de un pasajero
$nroDNI = $objPersona7->getNroDNI();

//Uso el nroDNI para verificar si el pasajero esta en la lista de viaje, si no lo esta, no continuo con la modificacion de datos
if($objViaje->buscarPasajeros($nroDNI) != -1){
    $nombre = "Lihuen";
    $apellido = "López";
    $telefono = "Tel-08";

    //Uso la funcion Viaje->modificarPasajero para cargar los datos
    $objViaje->modificarPasajero($nombre, $apellido, $nroDNI, $telefono);

    echo "Se modificaron los datos del pasajero.\n";
}else{
    echo "No se pueden modificar los datos porque el pasajero cuyo N° de DNI es ".$nroDNI." no se encuentra en la lista de viaje.\n";
}
echo "****************************************** FIN MODIFICAR DATOS PASAJERO ******************************************\n\n\n\n";


//Mostrar los datos del viaje
echo "****************************************** MOSTRAR DATOS DEL VIAJE ******************************************\n";
echo "Los datos del viaje son: \n".$objViaje."\n";
echo "****************************************** FIN MOSTRAR DATOS DEL VIAJE ******************************************\n\n\n\n";


//Vender pasaje
echo "****************************************** VENDER PASAJE ******************************************\n";
//$objPersona8 = new Pasajero ("Lucia", "García", "DNI-88", "Tel-2", 22, "Ticket-02");
//$objPersona8 = new PasajeroVIP ("Sofia", "Silva", "DNI-888", "Tel-3", 33, "Ticket-03", "VF-03", 300);
$objPersona8 = new PasajeroNecesidad ("Andrés", "Hernandez", "DNI-9", "Tel-9", 99, "Ticket-09", true, false, false);
$costoPasaje = $objViaje->venderPasaje($objPersona8);
if($costoPasaje == -1){
    echo "No se vendió el pasaje, el pasajero ya tiene un pasaje comprado con anterioridad.\n";
}elseif($costoPasaje == 0){
    echo "No se vende el pasaje, no hay lugares disponibles.\n";
}else{
    echo "Pasaje vendido. El costo es de: $".$costoPasaje."\n";
}
echo "****************************************** FIN VENDER PASAJE ******************************************\n\n\n\n";


//Costo total, de todos los pasajes
echo "****************************************** SUMA COSTOS ******************************************\n";
echo "La suma total de los costos de todos los pasajes es de $".$objViaje->sumaCostos()."\n";
echo "****************************************** FIN SUMA COSTOS ******************************************\n\n\n";

echo $objViaje;*/

//Armo el menu de opciones
do{
    echo "\n\n¿Qué desea hacer?\n  
    1) Mostrar los datos del viaje.\n  
    2) Cargar responsable.\n  
    3) Buscar pasajero.\n  
    4) Cargar pasajero.\n  
    5) Modificar pasajero.\n  
    6) Modificar viaje.\n  
    7) Mostrar un listado actualizado de los viajes.\n  
    8) Vender Pasaje.\n  
    9) Costo total (suma de todos los pasajes).\n
    10) Salir.\n";
    $opcion = trim(fgets(STDIN));

    switch($opcion){
        case "1":
            //Mostrar los datos del viaje.
            echo $objViaje."\n\n";
            break;


        case "2":
            //Cargar responsable
            echo "Ingrese el N° de empleado del responsable: ";
            $nroEmpleado = trim(fgets(STDIN));

            echo "Ingrese el N° de licencia del responsable: ";
            $nroLicencia = trim(fgets(STDIN));

            echo "Ingrese el nombre del responsable: ";
            $nombre = trim(fgets(STDIN));

            echo "Ingrese el apellido del responsable: ";
            $apellido = trim(fgets(STDIN));


            $objViaje->cargarResponsable($nroEmpleado, $nroLicencia, $nombre, $apellido);

            echo "\nEl responsable se cargó correctamente.\n\n";
            break;

        case "3":
            //Buscar pasajero
            echo "Ingrese el N° de DNI a buscar: ";
            $nroDNI = trim(fgets(STDIN));

            if($objViaje->buscarPasajeros($nroDNI) != -1){
                echo "\nEl pasajero cuyo N° de DNI es ".$nroDNI.", se encuentra registrado en el viaje.\n";
            }else{
                echo "\nEl N° de DNI ".$nroDNI." no está registrado en el viaje.\n";
            }
            break;


        case "4":
            //Cargar pasajero
            echo "Ingrese el nombre del pasajero: ";
            $nombre = trim(fgets(STDIN));

            echo "Ingrese el apellido del pasajero: ";
            $apellido = trim(fgets(STDIN));

            echo "Ingrese el N° de DNI del pasajero: ";
            $nroDNI = trim(fgets(STDIN));

            echo "Ingrese el N° de teléfono del pasajero: ";
            $telefono = trim(fgets(STDIN));

            echo "Ingrese el N° de asiento del pasajero: ";
            $nroAsiento = trim(fgets(STDIN));

            echo "Ingrese el N° de ticket del pasajero: ";
            $nroTicket = trim(fgets(STDIN));

            echo "Ingrese el N° de viajero frecuente del pasajero (Si no tiene coloque 0): ";
            $nroViajeroFrecuente = trim(fgets(STDIN));

            if($nroViajeroFrecuente != 0){
                echo "Ingrese la cantidad de millas del pasajero (N° positivo o 0): ";
                $cantMillas = trim(fgets(STDIN));

                $sillaRuedas = false;
                $asistenciaEmbarque = false;
                $alimento = false;                
            }

            if($nroViajeroFrecuente == 0){
                $cantMillas = 0;

                echo "¿El pasajero utiliza silla de ruedas? (true/false): ";
                $sillaRuedas = trim(fgets(STDIN));
    
                echo "¿El pasajero necesita asisitencia en el embarque/desembarque? (true/false): ";
                $asistenciaEmbarque = trim(fgets(STDIN));
    
                echo "¿El pasajero necesita un alimento especial? (true/false): ";
                $alimento = trim(fgets(STDIN));    
            }

            //Invoco la función que carga pasajeros
            if($objViaje->cargarPasajero($nombre, $apellido, $nroDNI, $telefono, $nroAsiento, $nroTicket, $nroViajeroFrecuente, $cantMillas, $sillaRuedas, $asistenciaEmbarque, $alimento)){
                echo "\nEl pasajero se agregó al viaje.\n\n";
            }else{
                echo "\nNo pudo agregarse el pasajero.\n\n";
            }
            break;


        case "5":
            //Modificar pasajero
            echo "Ingrese el N° de DNI del pasajero que desea modificar para buscarlo: ";
            $nroDNI = trim(fgets(STDIN));

            if($objViaje->buscarPasajeros($nroDNI) != -1){
                echo "Ingrese el nuevo nombre del pasajero: ";
                $nombre = trim(fgets(STDIN));
    
                echo "Ingrese el nuevo apellido del pasajero: ";
                $apellido = trim(fgets(STDIN));
    
                echo "Ingrese el nuevo N° de teléfono del pasajero: ";
                $telefono = trim(fgets(STDIN));

                //Modifico los datos
                $objViaje->modificarPasajero($nombre, $apellido, $nroDNI, $telefono);

                echo "\nSe modificaron los datos del pasajero.\n\n";
    
            }else{
                echo "El pasajero cuyo N° de DNI es ".$nroDNI." no se encuentra registrado y por lo tanto no puede ser modificado\n\n";
            }
            break;


        case "6":
            //Modificar viaje.
            echo "Ingrese el nuevo código del viaje: ";
            $codigoNuevo = trim(fgets(STDIN));
            $objViaje->setCodigo($codigoNuevo);

            echo "Ingrese el nuevo destino del viaje: ";
            $destinoNuevo = trim(fgets(STDIN));
            $objViaje->setDestino($destinoNuevo);

            echo "Ingrese la nueva cantidad máxima de pasajeros del viaje: ";
            $cantMaxPasajerosNuevo = trim(fgets(STDIN));
            $objViaje->setCantMaxPasajeros($cantMaxPasajerosNuevo);

            echo "Ingrese el nuevo costo del viaje: ";
            $costoViaje = trim(fgets(STDIN));
            $objViaje->setCostoViaje($costoViaje);
            break;


        case "7":
            //Mostrar un listado actualizado de los viajes.
            echo $objViaje."\n\n";
            break;


        case "8":
            //Vender Pasaje.
            echo "Ingrese el nombre del pasajero: ";
            $nombre = trim(fgets(STDIN));

            echo "Ingrese el apellido del pasajero: ";
            $apellido = trim(fgets(STDIN));

            echo "Ingrese el N° de DNI del pasajero: ";
            $nroDNI = trim(fgets(STDIN));

            echo "Ingrese el N° de teléfono del pasajero: ";
            $telefono = trim(fgets(STDIN));

            echo "Ingrese el N° de asiento del pasajero: ";
            $nroAsiento = trim(fgets(STDIN));

            echo "Ingrese el N° de ticket del pasajero: ";
            $nroTicket = trim(fgets(STDIN));

            echo "Ingrese el N° de N° de viajero frecuente del pasajero: ";
            $nroViajeroFrecuente = trim(fgets(STDIN));

            echo "Ingrese la cantidad de millas del pasajero: ";
            $cantMillas = trim(fgets(STDIN));

            echo "¿El pasajero utiliza silla de ruedas?: ";
            $sillaRuedas = trim(fgets(STDIN));

            echo "¿El pasajero necesita asisitencia en el embarque/desembarque?: ";
            $asistenciaEmbarque = trim(fgets(STDIN));

            echo "¿El pasajero necesita un alimento especial?: ";
            $alimento = trim(fgets(STDIN));


            if($nroViajeroFrecuente == 0 && ($sillaRuedas == false && $asistenciaEmbarque == false && $alimento == false)){
                //Creo un nuevo objeto pasajero
                //PASAJERO: ($pnombre, $papellido, $pnroDNI, $ptelefono, $pnroAsiento, $pnroTicket)
                $objPasajero = new Pasajero($nombre, $apellido, $nroDNI, $telefono, $nroAsiento, $nroTicket);


            }elseif($nroViajeroFrecuente != 0 && $cantMillas < 300){
                $porcentajeVIP = 35;
                //Creo un nuevo objeto pasajeroVIP
                //VIP: ($pnombre, $papellido, $pnroDNI, $ptelefono, $pnroAsiento, $pnroTicket, $pnroViajeroFrecuente, $pcantMillas, $pporcentajeIncremento)
                $objPasajero = new PasajeroVIP($nombre, $apellido, $nroDNI, $telefono, $nroAsiento, $nroTicket, $nroViajeroFrecuente, $cantMillas, $porcentajeVIP);        


            }elseif($nroViajeroFrecuente != 0 && $cantMillas < 300){
                $porcentajeVIP = 30;
                //Creo un nuevo objeto pasajeroVIP
                //VIP: ($pnombre, $papellido, $pnroDNI, $ptelefono, $pnroAsiento, $pnroTicket, $pnroViajeroFrecuente, $pcantMillas, $pporcentajeIncremento)
                $objPasajero = new PasajeroVIP($nombre, $apellido, $nroDNI, $telefono, $nroAsiento, $nroTicket, $nroViajeroFrecuente, $cantMillas, $porcentajeVIP);        


            }elseif($sillaRuedas == true && $asistenciaEmbarque == true && $alimento == true){
                $porcentajeNecesidad = 30;
        
                //Creo un nuevo objeto pasajeroNecesidad
                //NECESIDAD: ($pnombre, $papellido, $pnroDNI, $ptelefono, $pnroAsiento, $pnroTicket, $pporcentajeIncremento, $psillaRuedas, $pasistenciaEmbarque, $palimento)
                $objPasajero = new PasajeroNecesidad($nombre, $apellido, $nroDNI, $telefono, $nroAsiento, $nroTicket, $nroViajeroFrecuente, $porcentajeNecesidad, $sillaRuedas, $asistenciaEmbarque, $alimento);
        
        
            }elseif($nroViajeroFrecuente == 0 && ($sillaRuedas == true || $asistenciaEmbarque == true || $alimento == true)){
                $porcentajeNecesidad = 15;
        
                //Creo un nuevo objeto pasajeroNecesidad
                //NECESIDAD: ($pnombre, $papellido, $pnroDNI, $ptelefono, $pnroAsiento, $pnroTicket, $pporcentajeIncremento, $psillaRuedas, $pasistenciaEmbarque, $palimento)
                $objPasajero = new PasajeroNecesidad($nombre, $apellido, $nroDNI, $telefono, $nroAsiento, $nroTicket, $nroViajeroFrecuente, $porcentajeNecesidad, $sillaRuedas, $asistenciaEmbarque, $alimento);
            }
        
            if($objViaje->venderPasaje($objPasajero) != -1){
                echo "\nEl pasaje fue vendido.\n";
            }else{
                echo "\nNo se vendió el pasaje\n";
            }
            break;


        case "9":
            //Costo total (suma de todos los pasajes).
            echo "La suma total de los costos de todos los pasajes es de $".$objViaje->sumaCostos()."\n";
            break;


        case "10":
            //Salir.
            echo "Muchas gracias por Viajar con VIAJE FELIZ!!! Que tenga un buen viaje!!!.\n\n";
            break;


        default;
        echo "Opción inválida. Por favor ingrese una opción del 1 al 10.\n\n";
            break;
    }
}while($opcion != 10);
