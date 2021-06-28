
<?php
$serverName = "DESKTOP-7GPH1DG\MSSQLSERVER01"; //serverName\instanceName

// Puesto que no se han especificado UID ni PWD en el array  $connectionInfo,
// La conexión se intentará utilizando la autenticación Windows.
$connectionInfo = array( "Database"=>"master");
$conn = sqlsrv_connect( $serverName, $connectionInfo);

?>