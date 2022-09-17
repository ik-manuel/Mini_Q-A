<?php

/*
* Create and get user
* Validate user
* Instatiate DB class for query
*/
class User{
    private $db;
    public $data;

    public function __construct(){
        $this->db = new Database;
    }

    //Find user by Email
    public function findUserByEmail($data){
        $this->db->prepare("SELECT * FROM users WHERE email = :email");
        $this->db->bind(':email', $data['email']);
        $row = $this->db->fetchRow();
        //check email result
        if($this->db->rowCount() > 0){
            return true;
        }else{
            return false;
        }
    }

    //Create new user record in db
    public function createNewUser($data){
        $this->db->prepare("INSERT INTO users (name, email, password) VALUES(:name, :email, :password)");
        //Bind data
        $this->db->bind(':name', $data['name']);
        $this->db->bind(':email', $data['email']);
        $this->db->bind(':password', $data['password']);
        //execute bind data
        if($this->db->execute()){
            return true;
        }else{
            return false;
        }
    }//End of CreateNewUser Class

    //Register user
    public function register(){
        // Check for Post
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            // process form data

            //Sanitize POST data
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            //Init data
            $this->data = [
                'name' => trim($_POST['name']),
                'email' => trim($_POST['email']),
                'password' => trim($_POST['password']),
                'confirm_password' => trim($_POST['confirm_password']),
                'name_err' => '',
                'email_err' => '',
                'password_err' => '',
                'confirm_password_err' => ''
            ];

            //Validate Name
            if(empty($_POST['name'])){
                $this->data['name_err'] = "Please Enter Name";
            }

            //Validate Email
            if(empty($_POST['email'])){
                $this->data['email_err'] = "Please Enter Email";
            }elseif($this->findUserByEmail($this->data)){
                $this->data['email_err'] = "Email is already taken";
            }

            //Validate Password
            if(empty($_POST['password'])){
                $this->data['password_err'] = "Please Enter Password";
            }elseif(strlen($this->data['password']) < 6){
                $this->data['password_err'] = "Password must be at least 6 characters";
            }

            //Validate Confirm Password
            if(empty($_POST['confirm_password'])){
                $this->data['confirm_password_err'] = "Please Confirm Password";
            }else{
                if($this->data['password'] != $this->data['confirm_password']){
                    $this->data['confirm_password_err'] = "Password do not match";
                }
            }

            // Make sure error is empty to finally register user
            if(empty($this->data['name_err']) && empty($this->data['email_err']) && empty($this->data['password_err']) && empty($this->data['confirm_password_err'])){
                //Validate
                //create hash password
                $this->data['password'] = password_hash($this->data['password'], PASSWORD_DEFAULT);

                //Register user
                if($this->createNewUser($this->data)){
                    //redirect function here
                    header("location:". URL_ROOT . "/login.php");
                }else{
                    die("Something went wrong");
                }
            }else{
                return $this->data;
            }
        
            
        }else{
             //init data
             $this->data = [
                'name' => '',
                'email' => '',
                'password' => '',
                'confirm_password' => '',
                'name_err' => '',
                'email_err' => '',
                'password_err' => '',
                'confirm_password_err' => ''
            ];
        }
    }//End of Register Class


    //Login user
    public function login(){
        // Check for Post
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            // process form data

            //Sanitize POST data
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            //Init data
            $this->data = [
                'email' => trim($_POST['email']),
                'password' => trim($_POST['password']),
                'email_err' => '',
                'password_err' => ''
            ];

            //Validate Email
            if(empty($_POST['email'])){
                $this->data['email_err'] = "Please Enter Email";
            }

            //Validate Password
            if(empty($_POST['password'])){
                $this->data['password_err'] = "Please Enter Password";
            }


            // Make sure error is empty
            if(empty($this->data['name_err']) && empty($this->data['email_err']) && empty($this->data['password_err']) && empty($this->data['confirm_password_err'])){
                //Validate
                die('SUCCESS');
            }else{
                return $this->data;
            }
        
            
        }else{
             //init data
             $this->data = [
                'email' => '',
                'password' => '',
                'email_err' => '',
                'password_err' => ''
            ];
        }
    }//End of Login class


}//END OF USER CLASS