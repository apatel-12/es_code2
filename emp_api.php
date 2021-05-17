<?php

require_once('api/server/EmployeeApi.php');
require_once('api/server/Auth.php');

$auth = new Auth();

$req_obj = $_REQUEST['obj'];
$req_type = $_REQUEST['req_type'];

$data = [ 'success' => 'false', 'msg' => 'invalid request'];

switch( $req_obj ) {
    case 'employee':
            $api = new EmployeeApi();
            $data = $api->employeeDataGet( $_GET['id'] ) ;
            break;
    case 'editemployee':
            $auth->requireLogin();
            $data_values=array("first_name"=>$_REQUEST['first_name'],
                               "last_name"=>$_REQUEST['last_name'],
                               "phone_number"=>$_REQUEST['phone_number'],
                               "office_number"=>$_REQUEST['office_number'],
                               "date_birth"=>$_REQUEST['date_birth'],
                               "employee_category"=>$_REQUEST['employee_category']
                               );
            $api = new EmployeeApi();
            $data = $api->employeeDataSet( $_REQUEST['id'],$data_values ) ;
            if($data)
                header("Location:frontend/employee_edit.php?m=updated&id=".$_REQUEST['id']);
            else
                header("Location:frontend/employee_edit.php?m=error");                
            break;
    case 'addemployee':
            $auth->requireLogin();
            $data_values=array("first_name"=>$_REQUEST['first_name'],
                                   "last_name"=>$_REQUEST['last_name'],
                                   "phone_number"=>$_REQUEST['phone_number'],
                                   "office_number"=>$_REQUEST['office_number'],
                                   "date_birth"=>$_REQUEST['date_birth'],
                                   "employee_category"=>$_REQUEST['employee_category']
                                   );
            $api = new EmployeeApi();
            $data = $api->employeeDataSet(null,$data_values ) ;
           
            if($data)
                header("Location:frontend/employee_list.php?m=add");
            else
                header("Location:frontend/employee_list.php?m=error"); 
            break;
    case 'employeedelete':
        $auth->requireLogin();
        $api = new EmployeeApi();
        $data = $api->employeeDelete( $_GET['id'] ) ;
       // print $data;exit;
        if($data)
            header("Location:frontend/employee_list.php?m=del");
        else
            header("Location:frontend/employee_list.php?m=error"); 
        break;
    case 'auth':
        if ( $req_type == 'doLogin' ) {
            $data = $auth->doLogin( $_REQUEST['username'], $_REQUEST['password'] );
        }
        else if ( $req_type == 'requireLogin' ) {
            $data = $auth->requireLogin();
        }
       // print_r($data);exit;
        if($data['success'])
            header("Location:frontend/employee_edit.php");
        else
        {
            print "Invalid Login Credentials. <a href='frontend/login.html'>Login Again</a>";
            exit;
           // header("Location:frontend/login.html");
        }
        break;
    default:
        header("Location:frontend/employee_edit.php");
        break;
}

if ( $data ) {
    echo json_encode($data);
    exit;
}