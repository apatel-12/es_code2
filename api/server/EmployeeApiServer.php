<?php

require_once( dirname(__FILE__) . '/../shared/EmployeeModel.php');

class EmployeeApiServer {

    public function employeeDataGet( $id ) {

        $model = new EmployeeModel();
        return $model->getById($id);

    }


}