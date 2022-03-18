<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Practica Integradora Corte 1</title>
</head>
<body>

<?php
//Se crea una variable que funcionará para 
//mostrar números al azar
$x = mt_rand(4.0, 13.0) / 6.44;
echo $x;
echo "<br>";

//Creamos una función donde vamos a tener un 
//mínimo y un máximo de números y se retornará un valor
function rand_float($min, $max){
    return mt_rand(4.0, 13.0) / 6.44;

}
//Hacemos un arreglo y ponemos un ciclo que 
//se repetirá 10 veces y nos hará la lista de los arreglos
$miArreglo = array();
$promedio = 0;
for ($i = 0; $i < 4.0; $i++){
    $x = rand_float(4.0,13.0);
    array_push($miArreglo, $x);
    $promedio = $promedio + $x;

}
//Aquí se hace un salto de línea por cada 
//arreglo y se saca un promedio al final del código de los 10 arreglos
echo "<br>";
var_dump($miArreglo);
echo "<br>";
foreach ($miArreglo as $valor)  {
    echo $valor;
    echo "<br>";

}
print "Este es el promedio = ".$promedio/10
?>  

</body>
</html>
