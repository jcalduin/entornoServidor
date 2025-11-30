<?php 

    $nombre = 'Tomás';
    $apellidos = 'Turbado';
    $edad = 45;
    $email = 'turbado.tomas@mail.com';

    echo "<p>El usuario $nombre $apellidos tiene $edad años. Contacto: $email</p>";

    //------------------------------------------

    $euros = 50;
    $tablaDolar = 1.08;
    $dolares = $euros * $tablaDolar;

    echo "<p>$euros euros son $dolares dolares</p>";

    //-----------------------------------------

    $mensaje = 'Hola Mundo';

    echo "<p>".strtoupper(trim($mensaje))."</p>";

    //---------------------------------------

    $usuario = 'admin'; $nivel = 1;

    if ($usuario === 'admin' && $nivel > 0) {
        echo '<p>Acceso total</p>';
    } else {
        echo '<p>Acceso Restringido</p>';
    }

    $nivel = 0;

    echo ($usuario === 'admin' && $nivel > 0) ? '<p>Acceso total</p>' : '<p>Acceso Restringido</p>';

    //------------------------------------------

    $dado = rand(1,6);
    switch ($dado) {
        case '1':
            echo 'Pifia';
            break;
        case '6':
            echo 'Crítico';
            break;
        default:
            echo 'Tirada normal';
            break;
    }
    echo '<br>';
    //--------------------------------------------

    $numero = 5; $i = 1;
    while ($i <= 10) {
        echo $numero * $i . ' ';
        $i++;  
    }

    //---------------------------------------
    
    $tareas = ['comprar pan','estudiar PHP','Hacer ejercicio'];
    $tareas[]= 'dormir';

    echo '<ol>';
    foreach ($tareas as $tarea) {
        echo "<li>$tarea</li>";
    }
    echo '</ol>';

    //-------------------------------------------

    $capitales = [
        "España" => "Madrid",
        "Francia"=> "París",
        "Italia"=> "Roma"
    ];
    foreach ($capitales as $pais => $capital) {
        echo "<p>$pais : $capital</p>";
    }

    //---------------------------------------------

    $clase = [
        ["nombre"=>"Ana", "nota"=>8],
        ["nombre"=> "Luis" , "nota"=> 4]
    ];

    foreach ($clase as $alumno) {
        if ($alumno["nota"] >= 5) {
            echo "<p>$alumno[nombre] : Aprobado</p>";
        } else {
            echo "<p>$alumno[nombre] : Suspenso</p>";
        }
    };

    //-------------------------------------------------
    echo "<br>";
    class Jugador {
        private $apodo;
        private $puntos;

        public function __construct($alumno, $puntos) {
            $this->apodo = $alumno;
            $this->puntos = $puntos;
        }
        
        public function getInfo(){
            return "Jugador: [$this->apodo][$this->puntos]pts";
        }
    }

    $equipo =[];

    $jugador1 = new Jugador('Pepe',15);
    $jugador2 = new Jugador('Juan',4);
    $jugador3 = new Jugador('Ernesto',21);

    $equipo = [$jugador1,$jugador2, $jugador3];

    echo "<ul>";    
    foreach ($equipo as $jugador) {
        echo "<li>".$jugador->getInfo()."</li>";    
    }
    echo "</ul>";

    //------------------------------------------------------

    $baseDeDatos =[
        "admin"=>"1234",
        "user"=> "0000"
    ];

    $usuarioInput= "admin"; $passInput = "1234";

    $validarUsuario = array_key_exists($usuarioInput, $baseDeDatos);
    if ($validarUsuario){
        if ($baseDeDatos[$usuarioInput] === $passInput){
            echo "<h1>Bienvenido</h1>";
        }else {
            echo "<h3>Contrseña incorrecta</h3>";
        }
    } else {
        echo "<h3>Usuario no encontrado</h3>";
    }
?>
