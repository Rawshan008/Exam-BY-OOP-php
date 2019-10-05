<?php 
include_once('classes/User.php');

$user = new User();

if($_SERVER['REQUEST_METHOD']=='POST'){
  $name = $_POST['name'];
  $username = $_POST['username'];
  $password = md5($_POST['password']);
  $email = $_POST['email'];

  $userreg = $user->userRegistration($name, $username, $password, $email);
  
}