<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
require_once(__DIR__.'/protected/database.php');
if(!isset($_POST['id'])){err('id missing', __LINE__);}

$id = $_POST['id'];
$fechaactualizacion= date('Ymd h:i:s A');

$query = "UPDATE Tb_PersonasFisicas SET Activo = 1, FechaActualizacion = '$fechaactualizacion' WHERE IdPersonaFisica = '$id'";
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