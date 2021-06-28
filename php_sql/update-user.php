<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
require_once(__DIR__.'/protected/database.php');

if(!isset($_POST['Nombre'])){err('id missing', __LINE__);}
if(!isset($_POST['ApellidoPaterno'])){err('id missing', __LINE__);}
if(!isset($_POST['ApellidoMaterno'])){err('id missing', __LINE__);}
if(!isset($_POST['RFC'])){err('id missing', __LINE__);}
if(!isset($_POST['FechaNacimiento'])){err('id missing', __LINE__);}
if(!isset($_POST['id'])){err('id missing', __LINE__);}
$nombre = $_POST['Nombre'];
$apellidop = $_POST['ApellidoPaterno'];
$apellidom = $_POST['ApellidoMaterno'];
$rfc = $_POST['RFC'];
$nacimiento = $_POST['FechaNacimiento'];
$id = $_POST['id'];
$fechaactualizacion= date('Ymd h:i:s A');

$query = "UPDATE Tb_PersonasFisicas SET FechaActualizacion = '$fechaactualizacion', Nombre = '$nombre', ApellidoPaterno = '$apellidop', ApellidoMaterno='$apellidom', RFC='$rfc', FechaNacimiento='$nacimiento' WHERE IdPersonaFisica = '$id'";
$stmt = sqlsrv_prepare( $conn, $query);
if($sa = sqlsrv_execute ($stmt)){
    echo "Agregado correctamente";
} else {
    echo "Error";
}

function err ($message = 'error', $debug = 0){
echo '{ "status":0,
        "message":"'.$message.'",
        "debug":'.$debug.'}';
exit();
}

?>