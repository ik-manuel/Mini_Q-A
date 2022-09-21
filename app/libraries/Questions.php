<?php

/*
* Create question and get question
* Instantiate db class - CRUD 
*/

class Questions{
    private $db;
    public $data;

    public function __construct(){
        $this->db = new Database;
    }


    //Fetch question rows
    public function fetchAllQuestions(){
        $this->db->query("SELECT * FROM questions");
        return $this->db->fetchRows();
    }//End of fetchQuestions

    //fetch Question by Id
    public function fetchQuestionById($id){
        $this->db->prepare("SELECT * FROM questions WHERE qst_id = :id");
        //bind data
        $this->db->bind(':id', $id);
        //execute
        $row = $this->db->fetchRow();
        return $row;
    }


    //fetch question and Validate Get request
    public function fetchQuestion(){
        //check Get request
        if($_SERVER['REQUEST_METHOD'] == 'GET'){
            //Sanitize Get input
            $_GET = filter_input_array(INPUT_GET, FILTER_SANITIZE_ENCODED);
            //check if get is empty
            if(!empty($_GET['qst'])){
                $resultSet = $this->fetchQuestionById($_GET['qst']);
                return $resultSet;
            }
            
        }
    }//End of FetchQuestion Method


    //Create question
    public function createNewQuestion($data){
        $this->db->prepare("INSERT INTO questions (question, user_id) VALUES(:question, :user_id)");
        //Bind data
        $this->db->bind(':question', $data['question']);
        $this->db->bind(':user_id', $data['user_id']);
        //execute bind data
        if($this->db->execute()){
            return true;
        }else{
            return false;
        }
    }//End of CreateNewquestion Method

    // Add question
    public function addQuestion(){
        //check for post
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            //Sanitize post input
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            //init data
            $this->data = [
                'question' => trim($_POST['question']),
                'user_id' => $_SESSION['user_id'],
                'questionErr' => '',
                'user_idErr' => ''
            ];

            //Validate data
            if(empty($_POST['question'])){
                $this->data['questionErr'] = 'Question Field can not be empty';
            }
            //check for active user session
            if(empty($_SESSION['user_id'])){
                $this->data['user_idErr'] = 'Login to ask question';
            }
            //Make sure error is empty
            if(empty($this->data['questionErr']) && empty($this->data['user_idErr'])){
                //process data
                if($this->createNewQuestion($this->data)){
                   flash('success_message', 'Question Added Successful!');
                }else{
                   die('Something went wrong');
                }
            }else{
                return $this->data;
            }
        }{
            $this->data = [
                'question' => '',
                'user_id' => '',
                'questionErr' => '',
                'user_idErr' => ''
            ];
        }
    }


}//END OF QUESTION CLASS