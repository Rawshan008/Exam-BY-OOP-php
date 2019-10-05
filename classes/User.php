<?php 

/**
 * Necessery File include
 */
$filepath = realpath(dirname(__FILE__));
include_once ($filepath.'/../lib/Database.php');
include_once ($filepath.'/../helpers/Format.php');

/**
 * User Class
 */

class User{
    private $db;
    private $fm;

    public function __construct(){
        $this->db = new Database();
        $this->fm = new Format();
    }

    public function getAllUser(){
        $query = "SELECT * FROM tbl_user ORDER BY id";
        $result = $this->db->select($query);
        return $result;
    }

    public function disableUser($disid){
        $query = "UPDATE tbl_user SET status = '1' WHERE id=$disid";
        $update_row = $this->db->update($query);
        if($update_row){
            $msg = "<span class='success'>Disable Success</span>";
            return $msg;
        }else{
            $msg = "<span class='error'>Disable Not Success</span>";
            return $msg;
        }
    }

    public function enableUser($enaid){
        $query = "UPDATE tbl_user SET status = '0' WHERE id=$enaid";
        $update_row = $this->db->update($query);
        if($update_row){
            $msg = "<span class='success'>Enable Successfu</span>";
            return $msg;
        }else{
            $msg = "<span class='error'>Enable Not Successfu</span>";
            return $msg;
        }
    }

    public function deleteUser($delid){
        $query = "DELETE FROM tbl_user WHERE id=$delid";
        $delete_row = $this->db->delete($query);
        if($delete_row){
            $msg = "<span class='success'>Delete Successfu</span>";
            return $msg;
        }else{
            $msg = "<span class='error'>Delete NOT Successfu</span>";
            return $msg;
        }
    }

    /**
     * User Registration
     */
    
     public function userRegistration($name, $username, $password, $email){
         $name = $this->fm->validation($name);
         $username = $this->fm->validation($username);
         $password = $this->fm->validation($password);
         $email = $this->fm->validation($email);

         $name = mysqli_real_escape_string($this->db->link, $name);
         $username = mysqli_real_escape_string($this->db->link, $username);
         $password = mysqli_real_escape_string($this->db->link, $password);
         $email = mysqli_real_escape_string($this->db->link, $email);

         if($name == '' || $username == '' || $password == '' || $email == ''){
             echo "<span class='error'>Field Must NOT be Empty !</span>";
             exit();
         }else if(filter_var($email, FILTER_VALIDATE_EMAIL)== false){
            echo "<span class='error'>Invalid Email Address !</span>";
            exit();
         }else{
             $checkemail = "SELECT * FROM tbl_user WHERE email = '$email'";
             $checkresult = $this->db->select($checkemail);
             if($checkresult != false){
                echo "<span class='error'>Email Already Exit !</span>";
                exit();
             }else{
                 $query = "INSERT INTO tbl_user(name, username, password, email) VALUE('$name', '$username','$password', '$email')";
                 $insert_row = $this->db->insert($query);
                 if($insert_row){
                     echo "<span class='success'>User Registration Successfullt</span>";
                     exit();
                 }else{
                    echo "<span class='error'>User Registration not Successfullt</span>";
                    exit(); 
                 }
             }
         }
     }
}