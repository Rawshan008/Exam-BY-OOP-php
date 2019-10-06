<?php include 'inc/header.php'; ?>
<?php 
	Session::checkSession();
	$questionans = $pro->getAllQuestion();

?>
<div class="main">
<h1>All Question with Answer</h1>
	<div class="test">
	<?php 
		if($questionans):
			while($result = $questionans->fetch_assoc()):
				$getallans = $pro->getAllAns($result['quesno']);
	?>
		<table> 
			<tr>
				<td colspan="2">
				 <h3>Que <?php echo $result['quesno']?>: <?php echo $result['ques']?></h3>
				</td>
			</tr>
			<?php while($arow = $getallans->fetch_assoc()): ?>
			<tr>
				<?php if($arow['rigntans'] == '1'): ?>
					<td style="color:green"><?php echo $arow['ans']; ?></td>
				<?php else: ?>
					<td><?php echo $arow['ans']; ?></td>
				<?php endif; ?>
			</tr>
			<?php endwhile; ?>

			
		</table>
		<?php 
			endwhile;
		endif;
		?>
</div>
 </div>
<?php include 'inc/footer.php'; ?>