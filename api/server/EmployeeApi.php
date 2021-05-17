<?php

require_once( dirname(__FILE__) . '/../shared/EmployeeModel.php');

class EmployeeApi {

    public function employeeDataGet( $id ) {

        $model = new EmployeeModel();
        return $model->getById($id);

    }
    public function employeeDataSet( $id=null, $employee_data ) {

       
         $model = new EmployeeModel();
         return $model->setEmployee($id,$employee_data);
 
     }
 
     public function getAllEmplyee() {
 
         $model = new EmployeeModel();
         return $model->getAll();
 
     }

     public function employeeDelete( $id ) {

        $model = new EmployeeModel();
        return $model->deleteById($id);

    }

}