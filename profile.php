<?php include 'inc/header.php'; ?>
<?php 
	Session::checkSession();
?>
<div class="main">
<h1>Update  -Profile</h1>

  
  <div class="userprofile">
	<form method="POST">
  <?php 
    $userid = Session::get("userid");
    $getData = $user->getUserProfilr($userid);
    if($getData):
      $user_row = $getData->fetch_assoc();
  ?>
		<table>
	    	<tr>
           <td><input type="hidden" name="id" id="id" value="<?php echo $userid;?>"></td>
        </tr>
	    	<tr>
           <td>Name</td>
           <td><input type="text" name="name" id="name" value="<?php echo $user_row['name'];?>"></td>
        </tr>
		    <tr>
           <td>Username</td>
           <td><input name="username" type="text" id="username" value="<?php echo $user_row['username'];?>"></td>
         </tr>
         <tr>
           <td>E-mail</td>
           <td><input name="email" type="text" id="email" value="<?php echo $user_row['email'];?>"></td>
         </tr>
         <tr>
           <td></td>
           <td><input type="submit" name="profileupdate" value="Update" id="profileupdate">
           </td>
         </tr>
       </table>
      <?php endif; ?>
	   </form>
     <span id="state"></span>
	</div>
	
  </div>
<?php include 'inc/footer.php'; ?>