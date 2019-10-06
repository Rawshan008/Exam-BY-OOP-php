<?php 
/**
 * Including Files
 */
$filepath = realpath(dirname(__FILE__));
include_once ($filepath.'/../lib/Database.php');
include_once ($filepath.'/../lib/Session.php');
include_once ($filepath.'/../helpers/Format.php');

/**
 * Process Class
 */
class Process{
    private $db;
    private $fm;

    public function __construct(){
        $this->db = new Database();
        $this->fm = new Format();
    }

    // process all data 
    public function processData($data){
         $selectedAns = $this->fm->validation($data['ans']);
         $number = $this->fm->validation($data['number']);
        
         $selectedAns = mysqli_real_escape_string($this->db->link, $selectedAns);
         $number = mysqli_real_escape_string($this->db->link, $number);

         $next = $number+1;
         
         if(!isset($_SESSION['score'])){
             $_SESSION['score'] == '0';
         }

         $total = $this->getTotalRow();
         $right = $this->rightAns($number);

         if($right == $selectedAns){
            $_SESSION['score']++;
         }

         if($number == $total){
             header("Location: final.php");
             exit();
         }else{
            header("Location: test.php?q=$next");
         }

    }

    // Get total 
    public function getTotalRow(){
        $query = "SELECT * FROM tbl_ques";
        $result = $this->db->select($query);
        $total = $result->num_rows;
        return $total;
    }

    // Right ans 
    public function rightAns($number){
        $query = "SELECT * FROM tbl_ans WHERE quesno='$number' AND rigntans='1'";
        $getdata = $this->db->select($query)->fetch_assoc();
        $result = $getdata['id'];
        return $result;
    }

    // all question with ans 
    public function getAllQuestion(){
        $query = "SELECT * FROM tbl_ques";
        $result = $this->db->select($query);
        return $result;
    }

    // get all ans 
    public function getAllAns($number){
        $query = "SELECT * FROM tbl_ans WHERE quesno='$number'";
        $result = $this->db->select($query);
        return $result;
    }
}