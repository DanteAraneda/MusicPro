<?php
/* define("KEY", "musicpro");
//metodo de encriptacion AES-128-ECB
define("COD", "AES-128-ECB");
//lugar donde esta la pagina
$host="localhost";
    //nombre de base de datos
$bd="musicaprofesional";

$usuario="root";
$contrasenia=""; */

 define("KEY", "musicpro");
//metodo de encriptacion AES-128-ECB
define("COD", "AES-128-ECB");
//lugar donde esta la pagina
$host="us-cdbr-east-05.cleardb.net";
    //nombre de base de datos
$bd="heroku_d8895d1bc05aa17";

$usuario="be1a66753f0664";
$contrasenia="64b614f6"; 


try {
    //conexion a la base de datos mediante un usuario
    $conexion=new PDO("mysql:host=$host;dbname=$bd", $usuario,$contrasenia);
    //Verifica si estas conectado
    //if($conexion){echo "Conectado... a sistema";}

} catch ( Exception $ex) {
    echo $ex->getMessage();
}

?>