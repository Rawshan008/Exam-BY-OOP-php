<?php include 'inc/header.php'; ?>
<?php 
	Session::checkLogin();
?>
<div class="main">
<h1>Online Exam System - User Login</h1>
	<div class="segment" style="margin-right:30px;">
		<img src="img/test.png"/>
	</div>
	<div class="segment">
	<form method="POST">
		<table class="tbl">    
			 <tr>
			   <td>Email</td>
			   <td><input name="email" type="email" id="email"></td>
			 </tr>
			 <tr>
			   <td>Password</td>
			   <td><input type="password" name="password" id="password"></td>
			 </tr>
			 
			  <tr>
			  <td></td>
			   <td><input type="submit" name="login" value="Login" id="loginsubmit">
			   </td>
			 </tr>
       </table>
	   </form>
	   <p>New User ? <a href="register.php">Signup</a> Free</p>
	   <span id="state"></span>
	</div>


	
</div>
<?php include 'inc/footer.php'; ?>