<?php 
include_once('classes/User.php');

$user = new User();

if($_SERVER['REQUEST_METHOD']=='POST'){
  $email = $_POST['email'];
  $password = md5($_POST['password']);
  

  $userreg = $user->userLogin($email ,$password);
  
}