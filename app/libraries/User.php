<?php

/*
* Create and get user
* Validate user
* Instatiate DB class for query
*/
class User{
    private $db;

    public $id;
    public $name;
    public $email;
    public $password;

    public function __construct(){
        $this->db = new Database;
    }

    //Get user record
    public function getUsers(){
        $stmt = $this->db->query("SELECT * FROM users");
        //return $stmt->fetchRows();
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

}//END OF USER CLASS