<?php 
$clase = [
    [
        "nombre"=> "Paco Gómez",
        "grupo"=> "A",
        "notas"=> [
            "DWECL"=> 8,
            "DWES"=> 7,
            "Despliegue"=> 9
        ]
    ],
    [
        "nombre"=> "Marta López",
        "grupo"=> "A",
        "notas"=> [
            "DWECL"=> 4.5,
            "DWES"=> 5,
            "Despliegue"=> 5
        ]
    ],
    [
        "nombre"=> "Luis García",
        "grupo"=> "B",
        "notas"=> [
            "DWECL"=> 3,
            "DWES"=> 4,
            "Despliegue"=> 2
        ]
    ],
    [
        "nombre"=> "Ana Ruiz",
        "grupo"=> "B",
        "notas"=> [
            "DWECL"=> 9,
            "DWES"=> 9.5,
            "Despliegue"=> 10
        ]
    ]
];

function notaMediaPromociona($notas) {
    $media =0;
    $promociona = true;
    $respuesta='';
    foreach ($notas as $key => $value) {
        $media += $value;
        if ($value < 5){
            $promociona = false;
        }
    };
    $media = round($media /=3,2);
    if ($promociona && $media > 5){
        $respuesta = "SI";
    } else {
        $respuesta = "NO";
    }
    $array = [$media, $respuesta];
    return $array;
};
 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }
        table {
            text-align: center;
            border-collapse: collapse;
            border: solid black;
            width: 800px;
            height: 350px;
        }
        thead, td, th {
            padding: 10px;
            border : solid 1px;
        }
        th {
            background-color: black;
            color: white;
            font-size: 1.5rem;
        }
        .filaAprobada {
            background-color: #a1e0a1ff;
        }
        .filaSuspensa {
            background-color: #e4a1abff;
        }

    </style>
</head>
<body>
    <h1>Boletín de clasificaicones - 2º DAW</h1>
    <table>
        <thead>
            <tr>
                <th>Alumno</th>
                <th>Grupo</th>
                <th>DWES</th>
                <th>DWECL</th>
                <th>Despliegue</th>
                <th>Media</th>
                <th>¿Promociona?</th>
            </tr>            
        </thead>
        <tbody>
        <?php 
            foreach ($clase as $alumno) {
                $claseFila = (notaMediaPromociona($alumno['notas'])[0] >= 5) ? 'filaAprobada' : 'filaSuspensa';
                echo "<tr class='$claseFila'>";
                echo "<td>$alumno[nombre]</td>";
                echo "<td>$alumno[grupo]</td>";
                foreach ($alumno['notas'] as $asignatura => $nota) {
                    echo "<td>$nota</td>";
                }
                echo "<td>". notaMediaPromociona($alumno['notas'])[0]."</td>";
                echo "<td>".notaMediaPromociona($alumno['notas'])[1]."</td>";
                echo "</tr>";
            };
        ?>  
        </tbody>
        
    </table>
</body>
</html>