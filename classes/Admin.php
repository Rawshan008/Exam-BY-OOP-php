<?php
/**
 * Including Files
 */
$filepath = realpath(dirname(__FILE__));
include_once ($filepath.'/../lib/Database.php');
include_once ($filepath.'/../lib/Session.php');
include_once ($filepath.'/../helpers/Format.php');
/**
 * Admin Class
 */
class Admin{
    private $db;
    private $fm;

    public function __construct(){
        $this->db = new Database();
        $this->fm = new Format();
    }
    
    public function getAdminData($data){
        $adminuser = $this->fm->validation($data['adminuser']);
        $adminpass = $this->fm->validation($data['adminpass']);
        
        $adminuser = mysqli_real_escape_string($this->db->link, $adminuser);
        $adminpass = mysqli_real_escape_string($this->db->link, md5($adminpass));

        $query = "SELECT * FROM tbl_admin WHERE adminuser='$adminuser' AND adminpass='$adminpass'";
        $result = $this->db->select($query);

        if($result != false){
            $value = $result->fetch_assoc();
            Session::init();
            Session::set("adminLogin",true);
            Session::set("adminuser",$value['adminuser']);
            Session::set("adminid",$value['id']);
            header("Location:index.php");
        }else{
            $msg = "<span class='error'>UserName and PassWord Does not Match</span>";
            return $msg;
        }
    }
}