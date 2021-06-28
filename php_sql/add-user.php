<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
require_once(__DIR__.'/protected/database.php');

if(!isset($_POST['Nombre'])){err('id missing', __LINE__);}
if(!isset($_POST['ApellidoPaterno'])){err('id missing', __LINE__);}
if(!isset($_POST['ApellidoMaterno'])){err('id missing', __LINE__);}
if(!isset($_POST['RFC'])){err('id missing', __LINE__);}
if(!isset($_POST['FechaNacimiento'])){err('id missing', __LINE__);}
if(!isset($_POST['User'])){err('id missing', __LINE__);}
$nombre = $_POST['Nombre'];
$apellidop = $_POST['ApellidoPaterno'];
$apellidom = $_POST['ApellidoMaterno'];
$rfc = $_POST['RFC'];
$nacimiento = $_POST['FechaNacimiento'];
$usuario = $_POST['User'];
$fechaRegistro= date('Ymd h:i:s A');

$query = "INSERT INTO Tb_PersonasFisicas (FechaRegistro, Nombre, ApellidoPaterno, ApellidoMaterno, RFC, FechaNacimiento, UsuarioAgrega, Activo) VALUES ('$fechaRegistro', '$nombre', '$apellidop', '$apellidom', '$rfc', '$nacimiento', '$usuario', 0)";
$stmt = sqlsrv_prepare( $conn, $query);
if($sa = sqlsrv_execute ($stmt)){
    echo "Agregado correctamente";
} else {
    echo "Error";
    echo $nombre;
    echo $apellidop;
    echo $apellidom;
    echo $rfc;
    echo $nacimiento;
    echo $usuario;
    echo $fechaRegistro;
}

function err ($message = 'error', $debug = 0){
echo '{ "status":0,
        "message":"'.$message.'",
        "debug":'.$debug.'}';
exit();
}

?>