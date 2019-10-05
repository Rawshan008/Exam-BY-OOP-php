<?php 
include_once('classes/User.php');

$user = new User();

if($_SERVER['REQUEST_METHOD']=='POST'){
  $id = $_POST['id'];
  $name = $_POST['name'];
  $username = $_POST['username'];
  $email = $_POST['email'];

  $userreg = $user->userProfileUpdate($id, $name, $username, $email);
  
}