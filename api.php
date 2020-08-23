<?php

require_once('api/server/EmployeeApiServer.php');

$api = new EmployeeApiServer();

$req_obj = $_GET['obj'];
$req_type = $_GET['req'];

$data = null;

switch( $req_obj ) {

    case 'employee':
        $data = $api->employeeDataGet( $_GET['id'] ) ;
    break;


}

if ( $data ) {
    echo json_encode($data);
}