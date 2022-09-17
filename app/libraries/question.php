<?php

/*
* Create question and get question
* Instantiate db class - CRUD 
*/

class Question{
    private $db;

    public function __construct(){
        $this->db = new Database;
    }

    //Fetch question rows
    public function fetchQuestions(){
        $this->db->query("SELECT * FROM questions");
        return $this->db->fetchRows();
    }//End of fetchQuestions

    //fetch Question by Id
    public function fetchQuestionById($id){
        $this->db->prepare("SELECT * FROM questions WHERE qst_id = :id");
        //bind data
        $this->db->bind(':id', $id);
        //execute
        return $this->db->fetchRow();
    }


}//END OF QUESTION CLASS