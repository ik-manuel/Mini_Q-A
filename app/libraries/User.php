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

    //User Session for existin user
    public function createUserSession($user){
        $_SESSION['user_id'] = $user->user_id;
        $_SESSION['name'] = $user->name;
        $_SESSION['email'] = $user->email;
        redirect('index.php');
    }//End of CreateUserSession Method
    
    //User Session for new user
    public function createNewUserSession($data){
        $this->db->prepare("SELECT * FROM users WHERE email = :email");
        $this->db->bind(':email', $data['email']);
        $row = $this->db->fetchRow();
        
        $_SESSION['user_id'] = $row->user_id;
        $_SESSION['name'] = $row->name;
        $_SESSION['email'] = $row->email;
        redirect('index.php');
    }//End of CreateNewUserSession Method

    //LogOut User and end Sessions
    public function logOut(){
        unset($_SESSION['user_id']);
        unset($_SESSION['name']);
        unset($_SESSION['email']);
        session_destroy();
        redirect('login.php');
    }//End of LogOut Method

    //isUserLogin
    public function isLoggedIn(){
        if(isset($_SESSION['user_id'])){
            return true;
        }else{
            return false;
        }
    }//End isLoggedIn method

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
    }//End of CreateNewUser Method

    //Find and Login User
    public function loginUser($data){
        $this->db->prepare("SELECT * FROM users WHERE email = :email");
        $this->db->bind(':email', $data['email']);
        $row = $this->db->fetchRow();
        //hashed password from db
        $hashed_password = $row->password;
        if(password_verify($data['password'], $hashed_password)){
            return $row;
        }else{
            return false;
        }
        
    }//End of LoginUser Method

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
                'nameErr' => '',
                'emailErr' => '',
                'passwordErr' => '',
                'confirm_passwordErr' => ''
            ];

            //Validate Name
            if(empty($_POST['name'])){
                $this->data['nameErr'] = "Please Enter Name";
            }

            //Validate Email
            if(empty($_POST['email'])){
                $this->data['emailErr'] = "Please Enter Email";
            }elseif($this->findUserByEmail($this->data)){
                $this->data['emailErr'] = "Email is already taken";
            }

            //Validate Password
            if(empty($_POST['password'])){
                $this->data['passwordErr'] = "Please Enter Password";
            }elseif(strlen($this->data['password']) < 6){
                $this->data['passwordErr'] = "Password must be at least 6 characters";
            }

            //Validate Confirm Password
            if(empty($_POST['confirm_password'])){
                $this->data['confirm_passwordErr'] = "Please Confirm Password";
            }else{
                if($this->data['password'] != $this->data['confirm_password']){
                    $this->data['confirm_passwordErr'] = "Password do not match";
                }
            }

            // Make sure error is empty to finally register user
            if(empty($this->data['nameErr']) && empty($this->data['emailErr']) && empty($this->data['passwordErr']) && empty($this->data['confirm_passwordErr'])){
                //Validate
                //create hash password
                $this->data['password'] = password_hash($this->data['password'], PASSWORD_DEFAULT);

                //Register user
                if($this->createNewUser($this->data)){
                    flash('success_message', 'Account Created Successful');
                    $this->createNewUserSession($this->data);
                    redirect("index.php");
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
                'nameErr' => '',
                'emailErr' => '',
                'passwordErr' => '',
                'confirm_passwordErr' => ''
            ];
        }
    }//End of Register Method


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
                'emailErr' => '',
                'passwordErr' => ''
            ];

            //Validate Email
            if(empty($_POST['email'])){
                $this->data['emailErr'] = "Please Enter Email";
            }

            //Validate Password
            if(empty($_POST['password'])){
                $this->data['passwordErr'] = "Please Enter Password";
            }

            //Check if user/email exist
            if($this->findUserByEmail($this->data)){
                //User Found
            }else{
                $this->data['emailErr'] = "Email/user do not exit";
            }


            // Make sure error is empty
            if(empty($this->data['nameErr']) && empty($this->data['emailErr']) && empty($this->data['passwordErr']) && empty($this->data['confirm_passwordErr'])){
                //Validate
                //Check and login user
                $loggedInUser = $this->loginUser($this->data);

                if($loggedInUser){
                    //set Session
                    $this->createUserSession($loggedInUser);
                }else{
                    $this->data['passwordErr'] = "Incorrect Password";
                }

            }else{
                return $this->data;
            }
        
            
        }else{
             //init data
             $this->data = [
                'email' => '',
                'password' => '',
                'emailErr' => '',
                'passwordErr' => ''
            ];
        }
    }//End of Login Method


}//END OF USER CLASS