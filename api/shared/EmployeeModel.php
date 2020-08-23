<?php

class EmployeeModel {

    protected $db_name='es_challenge';
    protected $db;

    public function connect() {
        $this->db = new PDO('mysql:host=localhost;dbname=' . $this->db_name, 'sqluser', 'jimzSQL');
    }
    
    public function __construct() {
        $this->db_path = dirname(__FILE__) . '../../challenge.db';
        $this->connect();
    }

    public function getById($id) {
        
        $result = $this->db->query('SELECT * FROM employees WHERE id=' . $id);
        
        if ( $result ) {
            $row = $result->fetchObject();
            return $row;
        }
    }

}