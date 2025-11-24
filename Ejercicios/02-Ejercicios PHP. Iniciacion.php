<?php

    echo "<h2>Variables y tipos de datos</h2>";
    $nombre = 'Rafael';
    $edad = 27;
    $ciudad = 'Málaga';
    echo "Nombre: $nombre <br>Edad: $edad <br>Ciudad: $ciudad<br>";

    $num = 50.5;
    var_dump($num);
    $num = (int) $num;
    var_dump($num);

    $num1 = 20;
    $num2 = 40;
    $sum = $num1 + $num2;
    echo "<br>El resultado de sumar $num1 + $num2 es $sum<br>";

    $bool = true;
    echo $bool; //con echo un boolean imprime un 1 si es false no imprime nada

    $cadenaTexto = "Hola mundo! ¿Como estas?";
    echo "<p>$cadenaTexto</p>";
    echo "<p>Longitud de la cadena: ".strlen($cadenaTexto)."</p>";
    echo "<p>Cadena en mayúsculas: ".strtoupper($cadenaTexto)."</p>";
    echo "<p>Cadena en minúsculas: ".strtolower($cadenaTexto)."</p>";

    echo "<p>Hola me llamo $nombre y tengo $edad años</p>";
    $arrayNombres = ["Ana","Marta","Paula"] ;
    echo $arrayNombres[0]."<br>";
    echo $arrayNombres[1]."<br>";
    echo $arrayNombres[2]."<br>";
/*---------------------------------------------------------------------------*/ 
    echo "<h2>Operadores</h2>";
    $num=5;
    if ($num%2== 0){
        echo "El numero es par";
    } else {
        echo "El número es impar";
    }
    echo"<br>";
    if ($num1 > $num2){
        echo "$num1 es mayor que $num2";
    } elseif ( $num1 < $num2){
        echo "$num1 es menor que $num2";
    } else {
        echo "$num1 y $num2 son iguales";
    }

    echo "<br>";

    if ($edad >=18 && $edad <= 65){
        echo "La persona tiene $edad años puede trabajar";
    } else {
        echo "La persona tiene $edad años, por lo tanto no puede trabajar";
    }
    
/*---------------------------------------------------------------------- */
    echo "<h2>Estructuras condicionales</h2>";
    $nota = 5.5;
    echo "<br>La nota es 5.5 estas: ";
    switch (true) {
        case ($nota >=0 && $nota <5):
            echo "Suspendo estudia mas la proxima";
            break;
        case ($nota >= 5 && $nota < 7):
            echo "Aprobado";
            break;
        case ($nota >= 7&& $nota < 9):
            echo "Notable";
            break;
        case ($nota >= 9&& $nota <= 10):
            echo "SobreSaliente, Eres un crack!!";
            break;
        default:
            echo "La nota no es válida";
            break;
    }
    echo "<br>";
    $dia = "Martes";
    switch (strtolower($dia)) {
        case 'lunes':
            echo "Estamos a lunes cara jaula";
            break;
        case 'martes':
            echo "$dia ?, pues come mierda hasta que te hartes";
            break;
        case 'miercoles':
            echo "$dia , los primos cabrones de los lunes";
            break;
        case 'jueves':
            echo "Ya huele finde papi";
            break;
        case 'viernes':
            echo "Es $dia y el cuerpo lo sabe";
            break;
        case 'sabado':
            echo "$dia sabadete y pa mi polla tu chochete";
            break;
        case 'domingo':
            echo "Los $domingos molan pero ojala fuera viernes otra vez";
            break;    
        default:
            echo "¿Y si introduces un dia válido?";
            break;
    }
    echo "<br>";
    $temperatura = 'javi';
    if (!is_numeric($temperatura)) {
        echo "No es un número!";
     }elseif ($temperatura < 0) {
        echo "Estamos por debajo de 0º, te queda congelado primo";
    } elseif ($temperatura >= 0 && $temperatura <= 30) {
        echo "Estamos entre 0º y 30º";
    } elseif ($temperatura > 30) {
        echo "Hace mas de 30º, esto ya es calor";
    };
    echo "<br>";
    $semaforo = "AmarilLo";
    if (strtolower($semaforo) === "verde"){
        echo "Puedes pasar, tranquilo";
    } elseif (strtolower($semaforo) === "rojo") {
        echo "Mas vale pararte, que esta en rojo";
    } elseif (strtolower($semaforo) === "amarillo") {
        echo "Si pasas, que sea con precaución! y rapido porque como te vean los guardias multita";
    } else{
        echo "$semaforo no es un color de semaforo";
    }
    echo "<br>";
    $contrasena = 'contraseña1234';
    $contrasenaGuardada = 'contraseña:';
    if ($contrasena === $contrasenaGuardada) {
        echo "Contraseña válida";
    } else {
        echo "La contraseña no es válida";
    };
    //----------------------------------------------------------------
    echo "<h2>Bucles</h2>";
    $num=1;
    while ($num <= 10) {
        echo "$num ";
        $num++;
    }
    $sum = 0;
    for ($i=1; $i <= 100 ; $i++) { 
        $sum += $i;
    }
    echo "<br>La suma de los numeros del 1 al 10 es $sum";
    echo "<br>";
    $frutas = ["manzana", "pera", "naranja", "plátano"];
    echo "Los elementos del array son:<br>";
    foreach ($frutas as $value) {
        echo $value ."<br>";
    }
    echo "<ul>";
    for ($i=1; $i <= 5; $i++) { 
        echo "<li>$i</li>";
    }
    echo"</ul>";
    $miArray = [5,6,8,1,3,4,0];
    $indice=0;
    echo "Entrada al bucle:<br>";
    do {
        $numero = $miArray[$indice];
        echo "El usuario introdujo $numero<br>";
        $indice++;
    } while ($numero != 0);
    echo "Salida del bucle<br>";
    //-------------------------------------
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>perfil.php</title>
</head>
<body>
    <h2>Tarjeta de perfil dinámica</h2>
    <?php
        $nombre_usuario = 'Javier';
        $profesion = 'Estudiante de DAW';
        $edad = 30;
        $tiene_github = true;
    ?>
    <h1><?= $nombre_usuario ?></h1>
    <h2><?= $profesion ?></h2>
    <p>Edad: <?=$edad ?> años</p>
    <?php
        if ($tiene_github) {
            echo "<a href='https://github.com/jcalduin'>Ver perdil de GitHub</a>";
        } 
    ?>    
</body>
</html>
<!------------------------------------------------------------------------->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculadora de precios</title>
</head>
<body>
    <h2>Calculadora de Precios de Tienda</h2>
    <?php  
        $precio_base = 70.00;
        $categoria = "ropa";
        $es_cliente_vip = false;
        $precioFinal=0;
        $vip;

        if (strtolower($categoria) === 'electronica'){
            $precioFinal = $precio_base * 0.85;
        } elseif (strtolower($categoria) === 'ropa' && $precio_base > 50) {
            $precioFinal = $precio_base *0.9;
        }
        if ($es_cliente_vip) {
            $precioFinal*= 0.95;
            $vip = "SI";
        } else {
            $vip ="NO";
        }

        echo "<p>Precio base: $precio_base €<br>Categoria: $categoria<br>Cliente VIP: $vip</p>";
        echo "<h3>Precio final: $precioFinal €</h3>";
    ?>
</body>
</html>
<!-------------------------------------------------------------------------------->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tienda</title>
    <style>
        body { font-family: sans-serif; }
        .calendario { display: flex; flex-wrap: wrap; width: 500px; border: 1px solid #ccc; }
        .dia { width: 60px; height: 60px; border: 1px solid #eee; padding: 5px; box-sizing: border-box; }
        .hoy { background-color: #ffc; font-weight: bold; }
    </style>
</head>
<body>
    <h1>Calendario de Noviembre</h1>
    <?php  
    $dias_del_mes = 30;
    $dia_actual =1;
    $dia_de_hoy = 11;

    echo "<div class='calendario'>";
    while ($dia_actual <= $dia_de_hoy) {

        if ($dia_actual == $dia_de_hoy) {
            echo "<div class='dia hoy'>$dia_actual</div>";
        } else {
            echo "<div class='dia'>$dia_actual</div>";
        }
        $dia_actual++;
    }
    echo "</div>";
    ?>
</body>
</html>