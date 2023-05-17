<?php

//Indico que archivos incluyo
include_once ("Pasajero.php");
include_once ("PasajeroVIP.php");
include_once ("PasajeroNecesidad.php");
include_once ("Responsable.php");
include_once ("Viaje.php");
//--------------------------------------------------------------------

//Creo mi coleccion de Pasajero
//($nombre, $apellido, $nroDoc, $telefono, $nroAsiento, $nroTicket, $nroViajeroFrec(VIP), $cantMillas(VIP), $silla(NECESIDAD), $asistencia(NECESIDAD), $comida(NECESIDAD))
$objPasajero1 = new Pasajero("Dario", "Fuentealba", 30111111, 111, "A-1", "T-101");
$objPasajero2 = new PasajeroVIP("Facundo", "Vasquez", 40333333, 333, "A-2", "T-102", "VF-01", 1500);
$objPasajero3 = new PasajeroNecesidad("Angel", "Cabrera", 50444444, 555, "A-3", "T-103", true, true, true);

//Array de objetos Pasajero
$colP[0] = $objPasajero1;
$colP[1] = $objPasajero2;
$colP[2] = $objPasajero3;

//--------------------------------------------------------------------

//Creo mi coleccion de Responsable
//($pnroEmpleado, $pnroLicencia, $pnombre, $papellido)
$objResponsable1 = new Responsable("N° 3", "Lic-3", "Leandro", "Spalletti");
$objResponsable2 = new Responsable("N° 6", "Lic-6", "Alan", "Aguirre");

//Array de objetos Responsable
$colR[0] = $objResponsable1;
$colR[1] = $objResponsable2;

//--------------------------------------------------------------------

//Creo mi coleccion de Viaje
//($codigo, $destino, $cantMaxPasajeros, $colPasajero, $objResponsable, $costoViaje, $sumaCostos)
$objViaje1 = new Viaje("Código-1", "Buenos Aires", 4, $colP, $objResponsable1, 1000, 999);
$objViaje2 = new Viaje("Código-2", "Neuquén", 2, $colP, $objResponsable2, 2000, 888);

//Array de objetos Viaje
$colV[0] = $objViaje1;
$colV[1] = $objViaje2;

//--------------------------------------------------------------------
/*
//Mis datos iniciales
echo "\n\n1) Pasajeros\n";
echo "Pasajero 1: ".$objPasajero1;
echo "Pasajero 2: ".$objPasajero2;
echo "Pasajero 3: ".$objPasajero3;
echo "\n\n2) Responsables\n";
echo "Responsable 1: ".$objResponsable1;
echo "Responsable 2: ".$objResponsable2;
echo "\n\n3) Viajes\n";
echo "Viaje 1: ".$objViaje1;
echo "Viaje 2: ".$objViaje2;
*/
//--------------------------------------------------------------------

//Invoco a la funcion venderPasaje($objPasajero) que debe incorporar el pasajero a la colección de pasajeros ( solo si hay espacio disponible), actualizar los costos abonados y retornar el costo final que deberá ser abonado por el pasajero.

//*****************************/
//aca pido por consola los datos 
echo "Ingrese el nombre: ";
$nombre = trim(Fgets(STDIN));

echo "Ingrese el apellido: ";
$apellido = trim(Fgets(STDIN));

echo "Ingrese el nroDoc: ";
$nroDoc = trim(Fgets(STDIN));

echo "Ingrese el teléfono: ";
$telefono = trim(Fgets(STDIN));

echo "Ingrese el nroAsiento: ";
$nroAsiento = trim(Fgets(STDIN));

echo "Ingrese el nroTicket: ";
$nroTicket = trim(Fgets(STDIN));

//Para PASAJERO VIP
echo "Ingrese el nroViajeroFrec y si no corresponde ponga N: ";
$nroViajeroFrec = trim(Fgets(STDIN));

echo "Ingrese el cantMillas y si no corresponde ponga N: ";
$cantMillas = trim(Fgets(STDIN));

//Para PASAJERO NECESIDAD
echo "Ingrese el silla (Si necesita ingrese 1, si no necesita deje en blanco (pulse ENTER)) y si no corresponde ponga N: ";
$silla = trim(Fgets(STDIN));

echo "Ingrese el asistencia (Si necesita ingrese 1, si no necesita deje en blanco (pulse ENTER)) y si no corresponde ponga N: ";
$asistencia = trim(Fgets(STDIN));

echo "Ingrese el comida (Si necesita ingrese 1, si no necesita deje en blanco (pulse ENTER)) y si no corresponde ponga N: ";
$comida = trim(Fgets(STDIN));


//*******************/
//CREACION DE OBJETOS

//Creo el obj PASAJERO STANDAR
$objPasajeroStandar = new Pasajero($nombre, $apellido, $nroDoc, $telefono, $nroAsiento, $nroTicket);

//Creo el obj PASAJERO VIP
$objPasajeroVIP = new PasajeroVIP($nombre, $apellido, $nroDoc, $telefono, $nroAsiento, $nroTicket, $nroViajeroFrec, $cantMillas);

//Creo el obj PASAJERO NECESIDAD
$objPasajeroNecesidad = new PasajeroNecesidad($nombre, $apellido, $nroDoc, $telefono, $nroAsiento, $nroTicket, $silla, $asistencia, $comida);


//***************/
//Invoco al metodo
//$texto = $objViaje1->venderPasaje($objPasajero4);
$encontro = $objViaje1->buscarPasajero($nroDoc);


//***************/
//Verifico que tipo de pasajero es (Standar, VIP o Necesidad)
if($nroViajeroFrec == "N" || $cantMillas == "N"){ //PUEDO PONER if($nroViajeroFrec == "N")
    if($silla == "N" || $asistencia == "N" || $comida == "N"){ //PUEDO PONER if($silla == "N")
        $texto = $objViaje1->venderPasaje($objPasajeroStandar);
    }else{
        if($silla != "N" || $asistencia != "N" || $comida != "N"){ //PUEDO PONER if($silla != "N")
            $texto = $objViaje1->venderPasaje($objPasajeroNecesidad);
        }
    }
}else{
    $texto = $objViaje1->venderPasaje($objPasajeroVIP);
}

//*********/
//Resultado
if($encontro){
    echo "No se puede agregar al pasajero porque ya compró un pasaje con anterioridad";
}else{
    if($hayLugar){
        echo "El monto a abonar es de $".$texto;
    }else{
        echo $texto; //No se puede agregar
    }
}
