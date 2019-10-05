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
}