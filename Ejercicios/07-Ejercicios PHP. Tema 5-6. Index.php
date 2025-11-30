<?php
require 'Tarea.php';

$tarea1 = new Tarea('Comprar pan','Alta');
$tarea2 = new Tarea('Estudiar DWES','Alta');
$tarea3 = new Tarea('Ver serie','baja');


$tareas = [$tarea1, $tarea2, $tarea3];

if (isset($_POST['descripcion'])&& isset($_POST['prioridad'])) {
    $nuevaTarea = new Tarea($_POST['descripcion'],$_POST['prioridad']);
    
    $tareas[] = $nuevaTarea;
}

if (isset($_GET['eliminar'])){
    $id = $_GET['eliminar'];
    unset($tareas[$id]);
    $tareas = array_values($tareas);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
    body {
        font-family: Arial, sans-serif;
        margin: 40px;
        background-color: #f5f5f5;
    }

    h1 {
        text-align: center;
        color: #333;
    }

    form {
        margin-bottom: 20px;
        text-align: center;
    }

    input[type="text"], select {
        padding: 5px 10px;
        margin-right: 10px;
        border-radius: 4px;
        border: 1px solid #ccc;
    }

    button {
        padding: 5px 15px;
        border: none;
        border-radius: 4px;
        background-color: #007BFF;
        color: white;
        cursor: pointer;
    }

    button:hover {
        background-color: #0056b3;
    }

    table {
        width: 70%;
        margin: 0 auto;
        border-collapse: collapse;
        box-shadow: 0px 0px 10px rgba(0,0,0,0.1);
        background-color: white;
    }

    table, th, td {
        border: 1px solid #ddd;
    }

    th, td {
        padding: 10px;
        text-align: center;
    }

    th {
        background-color: #007BFF;
        color: white;
    }

    a {
        color: #FF4C4C;
        text-decoration: none;
        font-weight: bold;
    }

    a:hover {
        text-decoration: underline;
    }
</style>

</head>
<body>
    <h1>Lista de Tareas (CRUD Array)</h1>
    <form action="" method="POST">
        <label for="descripcion">Descripción:</label>
        <input type="text" name="descripcion" id="descripcion">
        <select name="prioridad" id="prioridad">
            <option value="alta">Alta</option>
            <option value="baja">Baja</option>
        </select>
        <button type="submit">Añadir Tarea</button>
    </form>
    <table>
        <thead>
            <tr>
                <td>ID</td>
                <td>Descripción</td>
                <td>Prioridad</td>
                <td>Acción</td>
            </tr>
        </thead>

        <tbody>
        <?php foreach ($tareas as $key => $tarea): ?>
            <tr>
                <td><?= $key ?></td>
                <td><?= $tarea->getDescripcion() ?></td>
                <td><?= $tarea->getPrioridad() ?></td>
                <td><a href="?eliminar=<?= $key ?>">Eliminar</a></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>