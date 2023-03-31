<?php

include("viajeFeliz.php");

//Creo el objet viaje
$objViaje = new viaje(345, "Oslo", 4, "pasajeros");


//Invoco los métodos
echo $objViaje->escribirMensajeBienvenida(); 
$objViaje->opcion();
