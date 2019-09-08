<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>my record</title>
</head>
<body>
	<div id="header">
		<h1>Напоминалки</h1>
		<form action="/index.php" method="post">
			<input type="text" name="record" placeholder="Нужно не забыть...">
			<?php
				echo "<br />";
				if(!empty($message)){
				echo $message;
				echo "<br />";
			}
			?>
			<input type="submit" name="do_record" value="Записать">
		</form>
	</div>

<?php
	if(isset($arrMessage)):
?>

	<dir id="content">
		<div id="records">
			<div class="record">
				<form action="index.php" method="POST">
				<?php 

					foreach($arrMessage as $k => $v):
						$id = $v['id'];
						echo $id;
						echo $v['record'].' '."<button name='do_delete' value='$id'>удалить</button><br />";		
					endforeach;	
				 ?>	
				</form>
			</div>
		</div>
	</dir>
<?php
	endif;
?>
</body>
</html>