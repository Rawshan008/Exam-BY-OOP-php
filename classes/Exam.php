<?php
/**
 * file include
 */
$filepath = realpath(dirname(__FILE__));
include_once ($filepath.'/../lib/Database.php');
include_once ($filepath.'/../helpers/Format.php');

/**
 * Exam Class
 */
class Exam{
    private $db;
    private $fm;
    public function __construct(){
        $this->db = new Database();
        $this->fm = new Format();
    }

    public function getAllQuestion(){
        $query = "SELECT * FROM tbl_ques ORDER BY quesno ASC";
        $result = $this->db->select($query);
        return $result;
    }

    public function deleteQuestion($delqus){
        $query = "DELETE q, a
                  FROM tbl_ques as q INNER JOIN tbl_ans as a ON q.quesno=a.quesno
                  WHERE delid=$delqus";
        $deleteQues = $this->db->delete($query);
        if($deleteQues){
            $msg = "<span class='success'>Delete Question Successfullt</span>";
            return $msg;
        }else{
            $msg = "<span class='success'>Delete Question NOT Successfullt</span>";
            return $msg->mysqli_error();
        }
    }

    public function getTotalRow(){
        $query = "SELECT * FROM tbl_ques";
        $result = $this->db->select($query);
        $total = $result->num_rows;
        return $total;
    }

    public function getQuestion($data){
        $quesno = $this->fm->validation($data['quesno']);
        $ques = $this->fm->validation($data['ques']);
        $ans = array();
        $ans[1] = $this->fm->validation($data['ans1']);
        $ans[2] = $this->fm->validation($data['ans2']);
        $ans[3] = $this->fm->validation($data['ans3']);
        $ans[4] = $this->fm->validation($data['ans4']);
        $rigntans = $this->fm->validation($data['rigntans']);


        $quesno = mysqli_real_escape_string($this->db->link, $quesno);
        $ques = mysqli_real_escape_string($this->db->link, $ques);
        $ans[1] = mysqli_real_escape_string($this->db->link, $ans[1]);
        $ans[2] = mysqli_real_escape_string($this->db->link, $ans[2]);
        $ans[3] = mysqli_real_escape_string($this->db->link, $ans[3]);
        $ans[4] = mysqli_real_escape_string($this->db->link, $ans[4]);
        $rigntans = mysqli_real_escape_string($this->db->link, $rigntans);
        
        $query = "INSERT INTO tbl_ques(quesno, ques, delid) VALUE('$quesno', '$ques', '$quesno')";
        $insert_row = $this->db->insert($query);
        if($insert_row){
            foreach($ans as $key => $ansName){
                if($rigntans == $key){
                    $rquery = "INSERT INTO tbl_ans(quesno, rigntans, ans) VALUE('$quesno', '1', '$ansName')";
                }else{
                    $rquery = "INSERT INTO tbl_ans(quesno, rigntans, ans) VALUE('$quesno', '0', '$ansName')";
                }
                $insertrow = $this->db->insert( $rquery);
                if($insertrow){
                    continue;
                }else{
                    die("Error !!");
                }
            }
            $msg = "<span class='success'>Added Question Successful</span>";
            return $msg;
        }else{
            echo "Error";
        }
    }
}