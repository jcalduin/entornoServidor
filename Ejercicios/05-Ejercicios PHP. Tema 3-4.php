<?php
// =================================================================
// B A C K E N D   (Espacio para el alumno)
// =================================================================

// 1. Estructura de Datos: Array Multidimensional Asociativo [cite: 9]
// TODO: Inicializa el array con los 4 productos que se ven en la foto (Auriculares, Monitor, Cable, Ratón)
// Asegúrate de usar las claves: 'id', 'categoria', 'nombre', 'precio', 'stock'.
$inventario = [
    [
        "id"=>1,
        "categoria"=> "Audio",
        "nombre" => "Auriculares Bluetooth",
        "precio" => 29.99,
        "stock"=> 15
    ],
    [
        "id"=>2,
        "categoria"=> "Video",
        "nombre" => "Monitor 24 Pulgadas",
        "precio" => 120.5,
        "stock"=> 3
    ],
    [
        "id"=>3,
        "categoria"=> "Cables",
        "nombre" => "Cable HDMI 2m",
        "precio" => 9.99,
        "stock"=> 50
    ],
    [
        "id"=>4,
        "categoria"=> "Periféricos",
        "nombre" => "Ratón Inalámbrico",
        "precio" => 15.00,
        "stock"=> 2
    ]
];

// Variable para controlar qué lista mostrar (si la completa o la filtrada)
$productos_a_mostrar = $inventario;
$mensaje = "";

// 2. Funciones Personalizadas (Modularidad) [cite: 10]

/**
 * Función para Insertar un nuevo producto.
 * REQUISITO: Paso por referencia para modificar el array original 
 */
function agregarProducto(&$lista, $nombre, $categoria, $precio, $cantidad) {
    
    if ($nombre === "") { 
        return 'El nombre del producto no puede estar vacío';
    }
    if ($precio <= 0) {
        return 'El precio del producto no puede ser negativo';
    } 
    $nuevoProducto =[
        'id'=> count($lista)+1,
        'nombre'=> $nombre,
        'categoria'=> $categoria,
        'precio'=> $precio,
        'stock'=> $cantidad
    ];
    $lista[] = $nuevoProducto;
    return 'Producto agregado correctamente';
}

/**
 * Función para Buscar productos.
 * REQUISITO: Filtrar por nombre sin distinguir mayúsculas/minúsculas [cite: 5]
 */
function buscarProducto($lista, $termino) {
    $resultado = [];
    foreach ($lista as $key => $dato) {
        if (str_contains(strtolower($dato['nombre']),strtolower($termino))) {
            $resultado[] = $dato;
        }
    }
    return $resultado;
}

// 3. Lógica del Formulario (Procesar POST)
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    // A) Si el usuario pulsó "Añadir al Inventario" [cite: 23]
    if (isset($_POST['accion']) && $_POST['accion'] === 'insertar') {
        $nombre = isset($_POST['nombre']) ? trim($_POST['nombre']) :'';
        $categoria = isset($_POST['categoria']) ? trim($_POST['categoria']) :'';
        $precio = isset($_POST['precio']) ? floatval($_POST['precio']) : 0;
        $cantidad = isset($_POST['cantidad']) ? intval($_POST['cantidad']) : 0;

        $mensaje = agregarProducto($inventario,$nombre, $categoria, $precio, $cantidad);

        $productos_a_mostrar = $inventario;
    }
    
    // B) Si el usuario pulsó "Filtrar Lista" [cite: 19]
    if (isset($_POST['accion']) && $_POST['accion'] === 'buscar') {
        $termino = isset($_POST['termino']) ? trim($_POST['termino']) : '';

        if ($termino === '') {
            $productos_a_mostrar = $inventario;
            $mensaje = 'Introduce algún articulo para buscar (o deja vacío para mostrar todo)';
        } else {
            $productos_a_mostrar = buscarProducto($inventario,$termino);

            empty($productos_a_mostrar) ? $mensaje = "No se encontraron productos que coincidan con '$termino'." : $mensaje = count($productos_a_mostrar) . " producto(s) encontrados.";     

        }
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>ElectroShop Gestión</title>
    <style>
        body { font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; background-color: #f4f4f9; padding: 20px; }
        h1 { text-align: center; color: #333; margin-bottom: 30px; }
        .container { max-width: 1000px; margin: 0 auto; }
        
        /* Grid para los formularios */
        .forms-container { display: grid; grid-template-columns: 1fr 1fr; gap: 20px; margin-bottom: 30px; }
        .card { background: white; padding: 20px; border-radius: 8px; box-shadow: 0 2px 5px rgba(0,0,0,0.1); }
        .card h3 { margin-top: 0; color: #0056b3; border-bottom: 2px solid #eee; padding-bottom: 10px; }
        
        input, select { width: 100%; padding: 10px; margin: 8px 0; border: 1px solid #ddd; border-radius: 4px; box-sizing: border-box; }
        
        /* Botones */
        .btn { width: 100%; padding: 10px; border: none; border-radius: 4px; color: white; font-weight: bold; cursor: pointer; }
        .btn-blue { background-color: #0056b3; }
        .btn-green { background-color: #28a745; }
        .btn-blue:hover { background-color: #004494; }
        .btn-green:hover { background-color: #218838; }
        .link-reset { display: block; text-align: center; margin-top: 10px; color: #0056b3; text-decoration: none; }

        /* Tabla */
        table { width: 100%; border-collapse: collapse; background: white; box-shadow: 0 2px 5px rgba(0,0,0,0.1); }
        th, td { padding: 12px; text-align: left; border-bottom: 1px solid #ddd; }
        th { background-color: #333; color: white; }
        
        /* Estilos de Alerta  */
        .alerta-stock { color: red; font-weight: bold; background-color: #ffeeee; }
    </style>
</head>
<body>

<div class="container">
    <h1>⚡ ElectroShop Gestión</h1>

    <div class="forms-container">
        
        <div class="card">
            <h3>🔍 Buscar Producto</h3>
            <form method="POST" action="">
                <input type="hidden" name="accion" value="buscar">
                <label>Nombre del producto:</label>
                <input type="text" name="termino" placeholder="Ej: Monitor...">
                <button type="submit" class="btn btn-blue">Filtrar Lista</button>
                <a href="" class="link-reset">Ver Todos</a>
            </form>
        </div>

        <div class="card">
            <h3>➕ Nuevo Ingreso</h3>
            <form method="POST" action="">
                <input type="hidden" name="accion" value="insertar">
                <label>Nombre Producto:</label>
                <input type="text" name="nombre" required>
                
                <label>Categoría:</label>
                <select name="categoria">
                    <option value="Audio">Audio</option>
                    <option value="Video">Video</option>
                    <option value="Cables">Cables</option>
                    <option value="Periféricos">Periféricos</option>
                </select>
                
                <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 10px;">
                    <input type="number" name="precio" step="0.01" placeholder="Precio €" required>
                    <input type="number" name="cantidad" placeholder="Cant." required>
                </div>

                <button type="submit" class="btn btn-green">Añadir al Inventario</button>
            </form>
            <?php if($mensaje): ?>
                <p style="color: red; text-align: center;"><?php echo $mensaje; ?></p>
            <?php endif; ?>
        </div>
    </div>

    <h3>📦 Inventario Actual</h3>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Categoría</th>
                <th>Producto</th>
                <th>Precio</th>
                <th>Stock</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            foreach ($productos_a_mostrar as $key => $producto) {
                echo "<tr>";               
                    echo "<td>$producto[id]</td>";
                    echo "<td>$producto[categoria]</td>";
                    echo "<td>$producto[nombre]</td>";
                    echo "<td>$producto[precio] €</td>";
                    if ($producto["stock"] < 5 ) {
                        echo "<td class='alerta-stock'>&#9888; $producto[stock](Reponer)</td>";
                    } else {
                        echo "<td>$producto[stock] u.</td>";
                    }

                echo "</tr>";
            }
            ?>
        </tbody>
    </table>
</div>

</body>
</html>