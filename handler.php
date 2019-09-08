<?php
	/*
	require_once($_SERVER['DOCUMENT_ROOT'].'/connection.php');
	require_once($_SERVER['DOCUMENT_ROOT'].'/function.php');

	create_table_records();

	$data = $_REQUEST;
	
	if(empty($data['record'])){
		//остановить выполнение обработчика
		header("Location:/");
	}

	$conn = conn();
	$record = $data['record'];

	$sql = "SELECT MAX(id) FROM records";
	$result_query = $conn->query($sql);
	$id = $result_query->fetch(PDO::FETCH_ASSOC);
	$id = $id['MAX(id)']; 
	$id++;


	//ИМЕНОВЫННЫЙ PLACEHOLDER
	$sql = "INSERT INTO records (id,record) VALUES (:id,:record);";	//sql запрос 
	$snapshot = $conn->prepare($sql);									//снимок запроса
	$snapshot->execute([':id' => $id , ':record' => $record]);			//выполнение снмка запроса со значением

	/*
	//ПОЗИЦИОННЫЙ PLACEHOLDER
	$sql = "INSERT INTO records (id,record) VALUES (?,?);";			//sql запрос 
	$snapshot = $conn->prepare($sql);									//снимок запроса
	$snapshot->execute([$id,$record]);									//выполнение снмка запроса со значением
	*/
/*
	$sql = "SELECT * FROM records ORDER BY id DESC";
	$result_sql = $conn->query($sql);
	$data_DB = $result_sql->fetchAll(PDO::FETCH_ASSOC);
	
	//if(isset)

?>
	<form action="handler.php" method="POST">
<?php
		foreach($data_DB as $k => $v){
			echo $v['record'].' '."<input type='submit' name='do_delete".$k."' value='удалить'>";
			echo $k;
			echo "<br />";
		}
?>		
	</form>