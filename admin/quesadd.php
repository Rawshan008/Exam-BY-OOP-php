<?php 
    $filepath = realpath(dirname(__FILE__));
    include_once ($filepath.'/inc/header.php');
    include_once('../classes/Exam.php');
    $ques = new Exam();
?>


<div class="main">
<h1>Admin Panel - Add Question</h1>
<?php 
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $getQues = $ques->getQuestion($_POST);
        echo $getQues;
    }
    
    $total = $ques->getTotalRow();
    $next = $total+1;
?>

  <div class="question-class">
    <form action="" method="POST">
        <table class="table" >
            <tr>
                <td>Question No</td>
                <td>:</td>
                <td><input type="number" name="quesno" value="<?php if(isset($next)) echo $next;?>" required></td>
            </tr>
            <tr>
                <td>Question</td>
                <td>:</td>
                <td><input type="text" name="ques" placeholder="Enter Question ..." required></td>
            </tr>
            <tr>
                <td>Choice 1</td>
                <td>:</td>
                <td><input type="text" name="ans1" placeholder="Enter Choice 1" required></td>
            </tr>
            <tr>
                <td>Choice 2</td>
                <td>:</td>
                <td><input type="text" name="ans2" placeholder="Enter Choice 2" required></td>
            </tr>
            <tr>
                <td>Choice 3</td>
                <td>:</td>
                <td><input type="text" name="ans3" placeholder="Enter Choice 3" required></td>
            </tr>
            <tr>
                <td>Choice 4</td>
                <td>:</td>
                <td><input type="text" name="ans4" placeholder="Enter Choice 4" required></td>
            </tr>
            <tr>
                <td>Correct No</td>
                <td>:</td>
                <td><input type="number" name="rigntans" placeholder="Correct No" required></td>
            </tr>
            <tr>
                <td colspan="3" align="center"><input type="submit" value="Add Question"></td>
            </tr>
        </table>
    </form>
  </div>

	
</div>
<?php include 'inc/footer.php'; ?>