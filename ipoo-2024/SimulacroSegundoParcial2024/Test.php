<?php
include_once("Cliente.php");
include_once("Moto.php");
include_once("MotoNacional.php");
include_once("MotoImportada.php");
include_once("Venta.php");
include_once("Empresa.php");

/*
 * 1. Cree 2 instancias de la clase Cliente: $objCliente1, $objCliente2
 */
$objCliente1 = new Cliente("Alan", "Aguirre", false, "DNI", 123455678);
$objCliente2 = new Cliente("Francesca", "Gauna", true, "DNI", 67890987);

/*
 * 2. Cree 4 objetos Motos con la información visualizada en las siguientes tablas: código, costo, año fabricación, descripción, porcentaje incremento anual, activo entre otros.
 */
//($pcodigo, $pcosto, $panioFabricacion, $pdescripcion, $pporcentajeIncrementoAnual, $pactiva)
$objMoto1 = new MotoNacional(11, 2230000, 2022, "Benelli Imperiale 400 ", 1.85, true);
$objMoto2 = new MotoNacional(12, 584000, 2021, "Zanella Zr 150 Ohc", 1.70, true);
$objMoto3 = new MotoNacional(13, 999900, 2023, "Zanella Patagonian Eagle 250", 1.55, false);
//($pcodigo, $pcosto, $panioFabricacion, $pdescripcion, $pporcentajeIncrementoAnual, $pactiva, $ppaisOrigen,$pimpuesto)
$objMoto4 = new MotoImportada(14, 12499900, 2020, "Pitbike Enduro Motocross Apollo Aiii 190cc Plr", 2, true, "Francia", 6244400);

/*
 * 3. Se crea un objeto Empresa con la siguiente información: denominación =” Alta Gama”, dirección= “Av
 * Argenetina 123”, colección de motos= [$obMoto1, $obMoto2, $obMoto3] , colección de clientes =
 * [$objCliente1, $objCliente2 ], la colección de ventas realizadas=[].
 */
$objEmpresa = new Empresa("Alta Gama", "Av Argentina 123", [$objCliente1, $objCliente2], [$objMoto1, $objMoto2, $objMoto3, $objMoto4], []);

/*
 * 4. Invocar al método registrarVenta($colCodigosMoto, $objCliente) de la Clase Empresa donde el $objCliente es una referencia a la clase Cliente almacenada en la variable $objCliente2 (creada en el punto 1) y la colección de códigos de motos es la siguiente [11,12,13,14]. Visualizar el resultado obtenido.
 */
echo "\n******************** Punto 4) ********************\n";
echo "Precio final $".$objEmpresa->registrarVenta([11, 12, 13, 14], $objCliente2);
echo "\n******************** Punto 4) ********************\n\n\n\n";

/*
 * 5. Invocar al método registrarVenta($colCodigosMotos, $objCliente) de la Clase Empresa donde el $objCliente es una referencia a la clase Cliente almacenada en la variable $objCliente2 (creada en el punto 1) y la colección de códigos de motos es la siguiente [13,14]. Visualizar el resultado obtenido.
 */
echo "\n******************** Punto 5) ********************\n";
echo "Precio final $".$objEmpresa->registrarVenta([13, 14], $objCliente2);
echo "\n******************** Punto 5) ********************\n\n\n\n";


/*
* 6. Invocar al método registrarVenta($colCodigosMotos, $objCliente) de la Clase Empresa donde el $objCliente es una referencia a la clase Cliente almacenada en la variable $objCliente2 (creada en el punto 1) y la colección de códigos de motos es la siguiente [14,2]. Visualizar el resultado obtenido.
*/
echo "\n******************** Punto 6) ********************\n";
echo "Precio final $".$objEmpresa->registrarVenta([2, 14], $objCliente2);
echo "\n******************** Punto 6) ********************\n\n\n\n";


/*
* 7. Invocar al método informarVentasImportadas(). Visualizar el resultado obtenido.
*/
echo "\n******************** Punto 7) ********************\n";
//Inicializo variables
$colVentasImportadas = $objEmpresa->informarVentasImportadas();
$cadena = "";

//Uso for porque se cuantos ciclos hara
for($i = 0; $i < count($colVentasImportadas); $i++){
    for($j = 0; $j < count($colVentasImportadas[$i]); $j++){
        $cadena .= $colVentasImportadas[$i][$j]."\n---------------\n";

        echo "Las ventas importadas son:\n".$cadena;
    }
}
echo "\n******************** Punto 7) ********************\n\n\n\n";


/*
* 8. Invocar al método informarSumaVentasNacionales(). Visualizar el resultado obtenido.
*/
echo "\n******************** Punto 8) ********************\n";
echo "La suma de las ventas nacionales realizadas por la empresa es $".$objEmpresa->informarSumaVentasNacionales();
echo "\n******************** Punto 8) ********************\n\n\n\n";



/*
* 9. Realizar un echo de la variable Empresa creada en 2
*/
echo "\n******************** Punto 9) ********************\n";
//echo $objEmpresa;
echo "\n******************** Punto 9) ********************\n\n\n\n";
