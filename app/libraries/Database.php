<?php

/*
* PDO Database
* Create DB connection
* Create prepared Statements
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
    public function query($sql){
        $this->stmt = $this->dbh->prepare($sql);
    }

    //Bind Value
    public function bind($params, $value, $type = null){
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
        $this->stmt->bindValue($params, $value, $type);
    }

    // Execute prepare statement
    public function execute(){
        return $this->stmt->execute();

    }

    // Get result as an object
    public function resultSet(){
        $this->execute();
        return $this->stmt->fetchAll(PDO::FETCH_OBJ);
    }

    // Get single result as an object
    public function single(){
        $this->execute();
        return $this->stmt->fetch(PDO::FETCH_OBJ);
    }



}//END OF DB CLASS