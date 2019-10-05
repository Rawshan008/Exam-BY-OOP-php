<?php 
    $filepath = realpath(dirname(__FILE__));
    include_once ($filepath.'/inc/header.php');
    include_once('../classes/User.php');
    $user = new User();
?>
<?php
  // Session::checkLogin();
?>

<div class="main">

    <div class="manageuser">
    <h3 style="margin-bottom:10px;">Admin Panle - Mangage Users</h3>
    <?php 
        if(isset($_GET['dis'])){
            $disid = $_GET['dis'];
            $disUser = $user->disableUser($disid);
            if(isset($disUser)){
                echo $disUser;
            }
        }
        if(isset($_GET['ena'])){
            $enaid = $_GET['ena'];
            $enaUser = $user->enableUser($enaid);
            if(isset($enaUser)){
                echo $enaUser;
            }
        }
        if(isset($_GET['del'])){
            $delid = $_GET['del'];
            $delUser = $user->deleteUser($delid);
            if(isset($delUser)){
                echo $delUser;
            }
        }
    ?>
        <table class="tblone">
            <tr>
                <th>No</th>
                <th>Name</th>
                <th>UserName</th>
                <th>Email</th>
                <th>Action</th>
            </tr>
            <?php 
                $userData = $user->getAllUser();
                if($userData):
                    $i=0;
                    while($result = $userData->fetch_assoc()):
                        $i++;
            ?>
            <tr>
                <td>
                    <?php 
                        if($result['status'] == 1){
                            echo "<span class='error'>$i</span>";
                        }else{
                            echo $i;
                        }
                    ?>
                </td>
                <td><?php echo $result['name']?></td>
                <td><?php echo $result['username']?></td>
                <td><?php echo $result['email']?></td>
                <td>
                    <?php if($result['status'] == 0): ?>
                    <a onclick="return confirm('Are You Sure to Disable')" href="?dis=<?php echo $result['id']?>">Disable</a> ||
                    <?php else: ?>
                    <a onclick="return confirm('Are You Sure to Enable')" href="?ena=<?php echo $result['id']?>">Enable</a> ||
                    <?php endif; ?>
                    <a onclick="return confirm('Are You Sure to Remove')" href="?del=<?php echo $result['id']?>">Remove</a>
                </td>
            </tr>
            <?php endwhile;endif; ?>
        </table>
    </div>

	
</div>
<?php include 'inc/footer.php'; ?>