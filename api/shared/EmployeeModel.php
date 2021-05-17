<?php

require_once( dirname(__FILE__) . DIRECTORY_SEPARATOR . 'DB.php');

class EmployeeModel {

    public function getById($id) {
        
        $db = DB::connect();
        $result = $db->query('SELECT employees.id,
        employees.first_name,
        employees.last_name,
        employees.phone_number,
        employees.office_number,
        employees.date_birth,
        employees.employee_category,
        employees.username FROM employees WHERE id=' . $id);
        
       
        if ( $result ) {
            $row = $result->fetchObject();
            return $row;
        }
    }

    public function getAll()
    {
        $db = DB::connect();
        $result = $db->query('SELECT
        employees.id,
        employees.first_name,
        employees.last_name,
        employees.phone_number,
        employees.office_number,
        employees.date_birth,
        employees.employee_category,
        employees.username
         FROM employees ORDER by first_name');
        if ( $result )
        {
            return $result->fetchAll();
        }

    }
    public function setEmployee($employee_id = null, $emp_data)
    {
        $db = DB::connect();
       
        $first_name=$emp_data['first_name'];
        $last_name=$emp_data['last_name'];
        $phone_number=$emp_data['phone_number'];
        $office_number=$emp_data['office_number'];
        $date_birth=$emp_data['date_birth'];
        $employee_category=$emp_data['employee_category'];

        if($this->getById($employee_id))
        {
           
            //Update record
            $sql_update.=" first_name='$first_name'";
            if($last_name!='')
                $sql_update.=",last_name='$last_name'";
            if($phone_number!='')
                $sql_update.=",phone_number='$phone_number'";
            if($office_number!='')
                $sql_update.=",office_number='$office_number'";
            if($date_birth!='')
                $sql_update.=",date_birth='$date_birth'";
            if($employee_category!='')
                $sql_update.=",employee_category='$employee_category'";
            

            $result = $db->query("UPDATE employees set ".$sql_update."
                                 WHERE id=" . $employee_id);

            if($result)
            {
                return true;
            }
            else
            {
                return false;
            }
                
        }
        else
        {
            
            //Insert new record
            $username="user".rand(1,50);
            $password=$username;
            $result = $db->query('INSERT into employees(first_name,last_name,phone_number,office_number,date_birth,employee_category,username,`password`) values("'.$first_name.'","'.$last_name.'","'.$phone_number.'","'.$office_number.'","'.$date_birth.'","'.$employee_category.'","'.$username.'","'.$password.'" )');
           
            if($result)
            {
                return true;
            }
            else
            {
                return false;
            }
        }
        
    }

    public function deleteById($id) {
        
        $db = DB::connect();
        if($id!=2) // can not delete admin
            $result = $db->query('DELETE FROM employees WHERE id=' . $id);
    
        if ( $result ) 
            return true;
        else
            return false;
    }


}