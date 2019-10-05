<?php 
    $filepath = realpath(dirname(__FILE__));
    include_once ($filepath.'/inc/header.php');
    include_once('../classes/Exam.php');
    $ques = new Exam();
?>
<div class="main">

    <div class="manageuser">
    <h3 style="margin-bottom:10px;">Admin Panle - Mangage Question</h3>
    <?php 
        if(isset($_GET['delqus'])){
            $delqus = $_GET['delqus'];
            $deleteques = $ques->deleteQuestion($delqus);
            if(isset($deleteques)){
                echo $deleteques;
            }
        }
    ?>
        <table class="tblone">
            <tr>
                <th width="10%">No</th>
                <th width="80%">Question</th>
                <th width="10%">Action</th>
            </tr>
            <?php 
                $getQuestion = $ques->getAllQuestion();
               if($getQuestion):
                $i = 0;
                while($question = $getQuestion->fetch_assoc()):
                    $i++;
            ?>
            <tr>
                <td><?php echo $i; ?></td>
                <td><?php echo $question['ques']?></td>
                <td>
                    <a onclick="return confirm('Are You Sure to Remove')" href="?delqus=<?php echo $question['delid']?>">Remove</a>
                </td>
            </tr>
            <?php 
                endwhile;
            endif;
            ?>
        </table>
    </div>

	
</div>
<?php include 'inc/footer.php'; ?>