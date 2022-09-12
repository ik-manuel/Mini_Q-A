<?php

/*
* PDO Database
* Create DB connection
* Create prepared Statements
* Return results and rows
*/

class Database {
    private $host = DB_HOST;
    private $db_user = DB_USER;
    private $password = DB_PASSWORD;
    private $db_name = DB_NAME;

    private $dbh;
    private $stmt;
    private $error;


    public function __construct(){
        //Set DSN
        $dsn = "mysql:host=" . $this->host . ";dbname=" . $this->db_name;
        $options = array(
            PDO::ATTR_PERSISTENT => true,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        );

        //Create PDO Instance
        try{
            $this->dbh = new PDO($dsn, $this->db_user, $this->password, $options);
        }catch(PDOException $e){
            $this->errror = $e->getMessage();
            echo $this->error;
        }
    }

    // Prepare statement
    public function prepare($sql){
        $this->stmt = $this->dbh->prepare($sql);
    }

    // Query Statement
    public function query($sql){
        $this->stmt = $this->dbh->query($sql);
        return $this->stmt;
    }

    //Bind Value
    public function bind($param, $value, $type = null){
        if(is_null($type)){
            switch(true){
                case is_int($value):
                    $type = PDO::PARAM_INT;
                    break;
                case is_bool($value):
                    $type = PDO::PARAM_BOOL;
                    break;
                case is_null($value):
                    $type = PDO::PARAM_NULL;
                    break;
                default:
                    $type = PDO::PARAM_STR;
            }
        }
        $this->stmt->bindValue($param, $value, $type);
    }

    // Execute prepare statement
    public function execute(){
        return $this->stmt->execute();
    }

    // Get result as an object
    public function fetchRows(){
        //$this->execute();
        return $this->stmt->fetchAll(PDO::FETCH_OBJ);
    }

    // Get single result as an object
    public function fetchRow(){
        $this->execute();
        return $this->stmt->fetch(PDO::FETCH_OBJ);
    }

    // Get row count
    public function rowCount(){
        return $this->stmt->rowCount();
    }


}//END OF DB CLASS