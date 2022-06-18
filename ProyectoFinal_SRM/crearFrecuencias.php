<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Datos Analiticos</title>
    <link rel="stylesheet" href="./css/chartist.min.css">
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/estilos.css">
    <link rel="stylesheet" href="./css/estilos2.css">
    <script src="./js/chartist.min.js"></script>
</head>
<body>
    
    <div class="container">
        <div class="centro">
        <h1>Analisis de datos sobre Familias con televisión y computadoras</h1>
        <?php
             $archivo = "datosProcesados.json";
             $handle = fopen($archivo, 'r') or die("Error");
             $size = filesize($archivo);
             $contenido = fread($handle, $size);
             fclose($handle);
             $listaDatos = json_decode($contenido, true);
        ?>
        
        <table class="table">
            <th >Tabla de frecuencia</th>
            <th>Familias</th>
            <tr>
                <td class="">Familias con 0 Pantallas</td>
                <td><?php echo $listaDatos[0]['0_pantalla']; ?></td>
            </tr>
            <tr>
                <td>Familias con 1 Pantallas</td>
                <td><?php echo $listaDatos[0]['1_pantalla']; ?></td>
            </tr>
            <tr>
                <td>Familias con 2 Pantallas</td>
                <td><?php echo $listaDatos[0]['2_pantalla']; ?></td>
            </tr>
            <tr>
                <td>Familias con 3 Pantallas</td>
                <td><?php echo $listaDatos[0]['3_pantalla']; ?></td>
            </tr>
            <tr>
                <td>Familias con 4 Pantallas</td>
                <td><?php echo $listaDatos[0]['4_pantalla']; ?></td>
            </tr>
            <tr>
                <td>Familias con 0 Computadoras</td>
                <td><?php echo $listaDatos[1]['0_computadora']; ?></td>
            </tr>
            <tr>
                <td>Familias con 1 Computadoras</td>
                <td><?php echo $listaDatos[1]['1_computadora']; ?></td>
            </tr>
            <tr>
                <td>Familias con 2 Computadoras</td>
                <td><?php echo $listaDatos[1]['2_computadora']; ?></td>
            </tr>
            <tr>
                <td>Familias con 3 Computadoras</td>
                <td><?php echo $listaDatos[1]['3_computadora']; ?></td>
            </tr>
            <tr>
                <td>Familias con 4 Computadoras</td>
                <td><?php echo $listaDatos[1]['4_computadora']; ?></td>
            </tr>
        </table>
        <div class="ct-chart2 ct-octave"></div>

        <h2>Grafica de Familias con Televisores en sus casas</h2>
        <span class="temp"><span class="temp-box per1">&nbsp;</span>&nbsp; 0 Televisores</span>
        <span class="temp"><span class="temp-box per2">&nbsp;</span>&nbsp; 1 Televisores</span>
        <span class="temp"><span class="temp-box per3">&nbsp;</span>&nbsp; 2 Televisores</span>
        <span class="temp"><span class="temp-box per4">&nbsp;</span>&nbsp; 3 Televisores</span>
        <span class="temp"><span class="temp-box per5">&nbsp;</span>&nbsp; 4 Televisores</span>
        <div class="ct-chart ct-octave"></div>
        
        <h2>Grafica de Familias con computadoras en sus casas</h2>
        <span class="temp"><span class="temp-box per1">&nbsp;</span>&nbsp; 0 Computadoras</span>
        <span class="temp"><span class="temp-box per2">&nbsp;</span>&nbsp; 1 Computadoras</span>
        <span class="temp"><span class="temp-box per3">&nbsp;</span>&nbsp; 2 Computadoras</span>
        <span class="temp"><span class="temp-box per4">&nbsp;</span>&nbsp; 3 Computadoras</span>
        <span class="temp"><span class="temp-box per5">&nbsp;</span>&nbsp; 4 Computadoras</span>
        <div class="ct-chart1 ct-octave"></div>
        
        </div>
        <script>
            var datosBarras ={
                labels:[
                    '0 Pantallas',
                    '1 Pantalla',
                    '2 Pantallas',
                    '3 Pantallas',
                    '4 Pantallas',
                    '0 Computadoras',
                    '1 Computadoras',
                    '2 Computadoras'
                ],
                series: [{
                    name: 'serie-1',
                    data: [
                        <?php echo $listaDatos[0]['0_pantalla'] ?>,
                        <?php echo $listaDatos[0]['1_pantalla'] ?>,
                        <?php echo $listaDatos[0]['2_pantalla'] ?>,
                        <?php echo $listaDatos[0]['3_pantalla'] ?>,
                        <?php echo $listaDatos[0]['4_pantalla'] ?>,
                        <?php echo $listaDatos[1]['0_computadora'] ?>,
                        <?php echo $listaDatos[1]['1_computadora'] ?>,
                        <?php echo $listaDatos[1]['2_computadora'] ?>

                    ]
                }]
            };

            var opciones = {
                
                seriesBarDistance: 10,
                axisX: {
                    offset:80
                },
                axisY:{
                   offset:80,
                   labelInterpolationFnc: function(value){
                    return value
                   },
                scaleMinSpace:15
                    
                }
            };

            var opcionesResponsiveBar = [
                ['screen and (min-width: 640px) and (max-width:1500px)', {
                    axisX:{
                        labelInterpolationFnc: function(value){
                            return value;
                        }
                    }
                }],
                ['screen and (max-width: 640px)', {
                    seriesBarDistance: 10000,
                    axisX: {
                        labelInterpolationFnc: function(value){
                            return value[0];
                        }
                    }
                }]
            ];

            var data = {
                labels:[
                    "<?php echo round($listaDatos[0]['0_pantalla'] / 1000000 * 100, 2) . "%"; ?>",
                    "<?php echo round($listaDatos[0]['1_pantalla'] / 1000000 * 100, 2) . "%"; ?>",
                    "<?php echo round($listaDatos[0]['2_pantalla'] / 1000000 * 100, 2) . "%"; ?>",
                    "<?php echo round($listaDatos[0]['3_pantalla'] / 1000000 * 100, 2) . "%"; ?>",
                    "<?php echo round($listaDatos[0]['4_pantalla'] / 1000000 * 100, 2) . "%"; ?>"
                    
                ],
                series: [
                    <?php echo $listaDatos[0]['0_pantalla'] / 1000000; ?>,
                    <?php echo $listaDatos[0]['1_pantalla'] / 1000000; ?>,
                    <?php echo $listaDatos[0]['2_pantalla'] / 1000000; ?>,
                    <?php echo $listaDatos[0]['3_pantalla'] / 1000000; ?>,
                    <?php echo $listaDatos[0]['4_pantalla'] / 1000000; ?>
                ]};
                var data1 = {
                labels:[
                    "<?php echo round($listaDatos[1]['0_computadora'] / 1000000 * 100, 2) . "%"; ?>",
                    "<?php echo round($listaDatos[1]['1_computadora'] / 1000000 * 100, 2) . "%"; ?>",
                    "<?php echo round($listaDatos[1]['2_computadora'] / 1000000 * 100, 2) . "%"; ?>"
                    
                ],
                series: [
                    <?php echo $listaDatos[1]['0_computadora']; ?>,
                    <?php echo $listaDatos[1]['1_computadora']; ?>,
                    <?php echo $listaDatos[1]['2_computadora']; ?>,
                ]};

                
                
            var opcionesResponsive = [
            ["screen and (max-width: 640px)", {
            showLine: false,
            showArea: true
        }]
        ];

        new Chartist.Pie('.ct-chart', data, opcionesResponsive);
        new Chartist.Pie('.ct-chart1', data1, opcionesResponsive);
        new Chartist.Bar('.ct-chart2', datosBarras, opciones, opcionesResponsiveBar);
        </script>
    </div>
</body>
</html>