<?php

//Indico que archivos incluyo
include_once ("pasajero2.php");
include_once ("responsable2.php");
include_once("viaje2.php");

//Creo mis objetos pasajero 2, responsable2 y viaje2
$objPasajero2 = new pasajero2(3);
$objResponsable2 = new responsable2("1415", "031-2", "Paola Alejandra", "Nuñez");
$objViaje2 = new viaje2(1234, "Cancun", "20", $objPasajero2, $objResponsable2);


// Cargo mi colección de pasajeros
$colPasa[0] = ["nombre" => "Lionel", "apellido" => "Messi", "dni" => "330", "telefono" => "154123456"];
$colPasa[1] = ["nombre" => "Lara", "apellido" => "Perez", "dni" => "111", "telefono" => "154998877"];


//Ahora le digo a mi objeto que esa es su colección de pasajeros
$objPasajero2->setColPasajeros($colPasa);


//Mis datos iniciales
echo $objViaje2;


//Cambio los datos de un pasajero
$ind = $objPasajero2->modificarPasajero("Edurne", "García Almagro", "309", "+34 671 13 06 75", "111");
if ($ind >= 0){
   echo "Se modifico el pasajero\n".$objPasajero2->mostrarDatosPasajeros()."\n";
}else{
   echo "No se encontraron datos que coincidan con ese pasajero";
}


//Agregar pasajero ---> Debe Sumar un pasajero al array, verificar que la cantidad máxima de pasajeros no sobrepase la cant de pasajeros, y ahí hacer un array_push
$objPasajero2->agregarPasajero("Sean", "Connery", "641", "154333222");
echo "Agregue pasajero ".$objPasajero2;

