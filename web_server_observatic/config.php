<?
$server = "localhost";
$user = "root";
$pass = "root";
$bd = "observatic";
 
//Creamos la conexión
$conexion = mysqli_connect($server, $user, $pass,$bd) 
or die("Ha sucedido un error inexperado en la conexion de la base de datos");

?>