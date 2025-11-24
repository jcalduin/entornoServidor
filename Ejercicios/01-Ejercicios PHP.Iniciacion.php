<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio1</title>
</head>
<body>
    <?php
        $nombreProducto = 'PC Gaming Modelo X';
        $precioBase = 800.50;
        $stock = 8;
        $enOferta = true;

        echo "<h1>$nombreProducto</h1>";
        echo 'Precio base: $precioBase €<br>';
        echo "Precio base: $precioBase €<br>";

        if ($enOferta){
            $precioFinal = $precioBase *0.9;
            echo "¡EN OFERTA! Precio final:  $precioFinal €";
        } else {
            $precioFinal = $precioBase ;
            echo "Precio: $precioFinal €";
        }

        if ($stock === 0) {
            echo "<p>Producto Agotado</p>";
        } elseif ($stock > 0 && $stock < 10) {
            echo "<p>¡Últimas unidades!</p>";
        } else {
            echo "<p>En stock</p>";
        }

        echo "<label for='cantidad'>Elegir cantidad </label>";
        echo "<select name= 'cantidad'>";
        $contador = 1;
        while ($contador <= $stock) {
            echo "<option value=$contador>$contador</option>";
            $contador++;
        }
        echo "</select>"
    ?>
</body>
</html>