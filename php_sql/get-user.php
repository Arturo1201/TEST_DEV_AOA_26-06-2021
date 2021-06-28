<?php

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
require_once(__DIR__.'/protected/database.php');

    $query = 'SELECT * FROM Tb_PersonasFisicas WHERE Activo = 0';
    $stmt = sqlsrv_query( $conn, $query );
    $raw=array();
    while ($row = sqlsrv_fetch_array($stmt)) {
        array_push ( $raw , $row );
    }
    echo json_encode($raw);

function err ($message = 'error', $debug = 0){
    echo '{ "status":0,
            "message":"'.$message.'",
            "debug":'.$debug.'}';
    exit();
}
?>