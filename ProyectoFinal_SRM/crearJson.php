<?php
    $archivo = fopen("datosCrudos.txt", "r");
    $numlinea = 0;
    
    $computadoras0 = 0;
    $computadoras1 = 0;
    $computadoras2 = 0;
    $computadoras3 = 0;
    $computadoras4 = 0;

    $televisores0 = 0;
    $televisores1 = 0;
    $televisores2 = 0;
    $televisores3 = 0;
    $televisores4 = 0;

    while($linea = fgets($archivo)){
        
        $aux[$numlinea] = $linea;
        if(substr($aux[$numlinea], 0, -4) == 0){
            $televisores0++;
        }
        if(substr($aux[$numlinea], 2) == 0){
            $computadoras0++;
        }
        
        if(substr($aux[$numlinea], 0, -4) == 1){
            $televisores1++;
        }
        if(substr($aux[$numlinea], 2) == 1){
            $computadoras1++;
        }
       
        if(substr($aux[$numlinea], 0, -4) == 2){
            $televisores2++;
        }
        if(substr($aux[$numlinea], 2) == 2){
            $computadoras2++;
        }
       
        if(substr($aux[$numlinea], 0, -4) == 3){
            $televisores3++;
        }
        if(substr($aux[$numlinea], 2) == 3){
            $computadoras3++;
        }
       
        if(substr($aux[$numlinea], 0, -4) == 4){
            $televisores4++;
        }
        if(substr($aux[$numlinea], 2) == 4){
            $computadoras4++;
        }
        
        $numlinea++;
    }

    $datos = Array(
        "0" => Array(
            "0_pantalla" => "$televisores0",
            "1_pantalla" => "$televisores1",
            "2_pantalla" => "$televisores2",
            "3_pantalla" => "$televisores3",
            "4_pantalla" => "$televisores4"
        ),
        "1" => Array(
            "0_computadora" => "$computadoras0",
            "1_computadora" => "$computadoras1",
            "2_computadora" => "$computadoras2",
            "3_computadora" => "$computadoras3",
            "4_computadora" => "$computadoras4"
        )
    );
    
    $json = json_encode($datos);
    $bytes = file_put_contents("datosProcesados.json", $json);
    echo "El archivo Json se ha creado con exito!";
    

?>